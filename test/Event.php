<?php

namespace Spiechu\LazyPimple;

final class Event
{
    const FIRST_EVENT = 'spiechu.lazy_pimple.first_event';

    /**
     * No instantiation allowed.
     */
    final private function __construct()
    {
    }
}
