<?php

namespace Spiechu\LazyPimple\Service;

class AwesomeService
{
    public function __construct()
    {
        echo 'awesome constructor called';
    }

    public static function staticHit()
    {
        echo 'static hit called';
    }

    public function instanceHit()
    {
        echo 'instance hit called';
    }
}
