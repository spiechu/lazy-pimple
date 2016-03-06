<?php

namespace Spiechu\LazyPimple\ServiceToExtend;

use Spiechu\LazyPimple\Service\AwesomeService;

class AwesomeServiceAwareClass implements AwesomeServiceAwareInterface
{
    /**
     * @var AwesomeService
     */
    protected $awesomeService;

    /**
     * {@inheritdoc}
     */
    public function setAwesomeService(AwesomeService $awesomeService)
    {
        $this->awesomeService = $awesomeService;
    }

    /**
     * @return bool
     */
    public function hasAwesomeServiceSet()
    {
        return $this->awesomeService instanceof AwesomeService;
    }
}
