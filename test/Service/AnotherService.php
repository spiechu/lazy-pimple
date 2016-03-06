<?php

namespace Spiechu\LazyPimple\Service;

class AnotherService
{
    public function __construct(AwesomeService $arg)
    {
        echo 'another service constructor called';
        echo get_class($arg);
    }
}
