<?php

namespace Spiechu\LazyPimple;

use Spiechu\LazyPimple\ServiceToExtend\AwesomeServiceAwareClass;
use Spiechu\LazyPimple\ServiceToExtend\BothInterfacesAwareClass;

class ServiceExtenderTest extends AbstractLazyPimpleTest
{
    public function testAwesomeServiceAwareClass()
    {
        /* @var $awesomeServiceAwareClass AwesomeServiceAwareClass */
        $awesomeServiceAwareClass = $this->container['awesome_service_aware'];

        $this->assertInstanceOf(AwesomeServiceAwareClass::class, $awesomeServiceAwareClass);
        $this->assertTrue($awesomeServiceAwareClass->hasAwesomeServiceSet());
    }

    public function testBothInterfacesAwareClass()
    {
        /* @var $bothInterfacesAwareClass BothInterfacesAwareClass */
        $bothInterfacesAwareClass = $this->container['both_interfaces_aware'];

        $this->assertInstanceOf(BothInterfacesAwareClass::class, $bothInterfacesAwareClass);
        $this->assertTrue($bothInterfacesAwareClass->hasAwesomeServiceSet());
        $this->assertTrue($bothInterfacesAwareClass->hasEventDispatcherServiceSet());
    }
}
