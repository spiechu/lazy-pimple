<?php

namespace Spiechu\LazyPimple\Factory;

use ProxyManager\Factory\LazyLoadingValueHolderFactory;
use ProxyManager\Proxy\VirtualProxyInterface;

class LazyServiceFactory
{
    /**
     * @var LazyLoadingValueHolderFactory
     */
    protected $lazyLoadingFactory;

    /**
     * @param LazyLoadingValueHolderFactory $lazyLoadingFactory
     */
    public function __construct(LazyLoadingValueHolderFactory $lazyLoadingFactory)
    {
        $this->lazyLoadingFactory = $lazyLoadingFactory;
    }

    /**
     * @param string   $className
     * @param callable $definition
     *
     * @return VirtualProxyInterface
     *
     * @throws \InvalidArgumentException When $definition callable doesn't return $className instance
     */
    public function getLazyServiceDefinition($className, callable $definition)
    {
        return $this->lazyLoadingFactory->createProxy(
            $className,
            // this fancy method signature is required by lazy loading factory
            function (&$wrappedObject, $proxy, $method, $parameters, &$initializer) use ($className, $definition) {
                $wrappedObject = call_user_func($definition);
                $initializer = null;

                // extra defensive programming in action
                if (!$wrappedObject instanceof $className) {
                    throw new \InvalidArgumentException(sprintf(
                        'Object "%s" is not instance of "%s"',
                        is_object($wrappedObject) ? get_class($wrappedObject) : gettype($wrappedObject),
                        $className
                    ));
                }

                return true;
            }
        );
    }
}
