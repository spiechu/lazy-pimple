<?php

namespace Spiechu\LazyPimple\ServiceToExtend;

use Spiechu\LazyPimple\Service\AwesomeService;

interface AwesomeServiceAwareInterface
{
    /**
     * @param AwesomeService $awesomeService
     */
    public function setAwesomeService(AwesomeService $awesomeService);
}
