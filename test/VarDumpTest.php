<?php

namespace Spiechu\LazyPimple;

use Pimple\Container;
use Spiechu\LazyPimple\Service\EventEmittingService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class VarDumpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Container
     */
    protected $container;

    public function setUp()
    {
        $this->container = require_once 'bootstrap.php';

        $this->assertInstanceOf(Container::class, $this->container);
    }

    public function testDontKillMeForThisTest()
    {
        ob_start();

        /* @var $eventDispatcher EventDispatcherInterface */
        $eventDispatcher = $this->container['event_dispatcher'];

        $this->assertTrue($eventDispatcher->hasListeners(Event::FIRST_EVENT));

        /* @var $eventEmittingService EventEmittingService */
        $eventEmittingService = $this->container['event_emitting_service'];
        $eventEmittingService->emit();

        $result = ob_get_clean();

        $this->assertRegExp('/^emitting first eventfirst subscriber constructor calledon first calledstatic hit calledawesome constructor calledinstance hit calledProxyManagerGeneratedProxy/i', $result);
    }
}