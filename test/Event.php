<?php

namespace Spiechu\LazyPimple;

final class Event
{
    const FIRST_EVENT = 'spiechu.lazy_pimple.first_event';

    /**
     * No instantiation allowed.
     */
    private function __construct()
    {
    }
}
