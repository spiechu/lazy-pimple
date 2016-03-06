<?php

namespace Spiechu\LazyPimple;

use Spiechu\LazyPimple\Service\EventEmittingService;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class VarDumpTest extends AbstractLazyPimpleTest
{
    public function testDontKillMeForThisTest()
    {
        ob_start();

        /* @var $eventDispatcher EventDispatcherInterface */
        $eventDispatcher = $this->container['event_dispatcher'];

        $this->assertInstanceOf(EventDispatcherInterface::class, $eventDispatcher);
        $this->assertTrue($eventDispatcher->hasListeners(Event::FIRST_EVENT));

        /* @var $eventEmittingService EventEmittingService */
        $eventEmittingService = $this->container['event_emitting_service'];

        $this->assertInstanceOf(EventEmittingService::class, $eventEmittingService);

        $eventEmittingService->emit();

        $result = ob_get_clean();

        $this->assertRegExp('/^emitting first eventfirst subscriber constructor calledon first calledstatic hit calledawesome constructor calledinstance hit calledProxyManagerGeneratedProxy/i', $result);
    }
}
