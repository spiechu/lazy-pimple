<?php

namespace Spiechu\LazyPimple;

use Spiechu\LazyPimple\Service\AwesomeService;
use Symfony\Component\EventDispatcher\Event as GenericEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FirstSubscriber implements EventSubscriberInterface
{
    /**
     * @var AwesomeService
     */
    protected $awesome;

    /**
     * @param AwesomeService $awesome
     */
    public function __construct(AwesomeService $awesome)
    {
        echo 'first subscriber constructor called';

        $this->awesome = $awesome;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::FIRST_EVENT => 'onFirst',
        ];
    }

    public function onFirst(GenericEvent $event)
    {
        echo 'on first called';

        // statics don't need instances, proxy should not instantiate service
        $this->awesome->staticHit();

        // now we should have instance
        $this->awesome->instanceHit();

        // we still have instance of Generatedfc5d1c4437cbb0... instance
        echo get_class($this->awesome);
    }
}
