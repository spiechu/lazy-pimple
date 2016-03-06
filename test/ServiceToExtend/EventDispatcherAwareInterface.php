<?php

namespace Spiechu\LazyPimple\ServiceToExtend;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface EventDispatcherAwareInterface
{
    /**
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher);
}
