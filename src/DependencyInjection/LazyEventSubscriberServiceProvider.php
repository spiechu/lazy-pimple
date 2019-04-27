<?php

namespace Spiechu\LazyPimple\DependencyInjection;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Spiechu\LazyPimple\Factory\LazyServiceFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LazyEventSubscriberServiceProvider implements ServiceProviderInterface
{
    /**
     * @var LazyServiceFactory
     */
    protected $lazyServiceFactory;

    /**
     * @var string
     */
    protected $eventDispatcherServiceName;

    /**
     * @var string[]
     */
    protected $eventSubscriberServiceNames;

    /**
     * @param LazyServiceFactory $lazyServiceFactory
     * @param string             $eventDispatcherServiceName
     * @param string[]           $eventSubscriberServiceNames
     */
    public function __construct(
        LazyServiceFactory $lazyServiceFactory,
        string $eventDispatcherServiceName,
        array $eventSubscriberServiceNames
    ) {
        $this->lazyServiceFactory = $lazyServiceFactory;
        $this->eventDispatcherServiceName = $eventDispatcherServiceName;
        $this->eventSubscriberServiceNames = $eventSubscriberServiceNames;
    }

    /**
     * {@inheritdoc}
     */
    public function register(Container $container): void
    {
        $eventDispatcher = $this->getEventDispatcher($container);

        foreach ($this->eventSubscriberServiceNames as $serviceName => $className) {
            // remember, here we have lazy subscribers
            // no subscriber instantiation until listened event is being dispatched
            $lazySubscriber = $this->lazyServiceFactory->getLazyServiceDefinition(
                $className,
                // encapsulate the whole Pimple service definition
                static function () use ($container, $serviceName) {
                    return call_user_func($container->raw($serviceName), $container);
                }
            );

            $eventDispatcher->addSubscriber($lazySubscriber);
        }
    }

    /**
     * @param Container $container
     *
     * @throws \InvalidArgumentException When container cannot instantiate EventDispatcher object
     *
     * @return EventDispatcherInterface
     */
    protected function getEventDispatcher(Container $container): EventDispatcherInterface
    {
        $eventDispatcher = $container[$this->eventDispatcherServiceName];

        if (!$eventDispatcher instanceof EventDispatcherInterface) {
            throw new \InvalidArgumentException(sprintf(
                'Container service "%s" is "%s" and not exptected instance of "EventDispatcherInterface"',
                $this->eventDispatcherServiceName,
                \is_object($eventDispatcher) ? \get_class($eventDispatcher) : \gettype($eventDispatcher)
            ));
        }

        return $eventDispatcher;
    }
}
