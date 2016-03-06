<?php

namespace Spiechu\LazyPimple\Service;

use Spiechu\LazyPimple\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class EventEmittingService
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function emit()
    {
        echo 'emitting first event';

        $this->eventDispatcher->dispatch(Event::FIRST_EVENT);
    }
}
