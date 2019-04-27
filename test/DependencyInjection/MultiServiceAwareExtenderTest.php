<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Spiechu\LazyPimple\DependencyInjection\ExtendServiceDefinition;
use Spiechu\LazyPimple\DependencyInjection\MultiServiceAwareExtender;
use Spiechu\LazyPimple\Service\AwesomeService;
use Spiechu\LazyPimple\ServiceToExtend\AwesomeServiceAwareClass;
use Spiechu\LazyPimple\ServiceToExtend\AwesomeServiceAwareInterface;

class MultiServiceAwareExtenderTest extends TestCase
{
    /**
     * @var MultiServiceAwareExtender
     */
    private $multiServiceAwareExtender;

    public function setUp()
    {
        $this->multiServiceAwareExtender = new MultiServiceAwareExtender([
            new ExtendServiceDefinition('awesome_service', AwesomeServiceAwareInterface::class, 'setAwesomeService'),
        ]);
    }

    public function testServiceWillBeConfiguredOnlyOnce(): void
    {
        $awesomeServiceMock = $this->createMock(AwesomeService::class);

        $containerMock = $this->createMock(Container::class);
        $containerMock->expects($this->once())->method('offsetGet')->willReturn($awesomeServiceMock);

        $object = new AwesomeServiceAwareClass();

        $f = $this->multiServiceAwareExtender;

        $f($object, $containerMock);
        $f($object, $containerMock);

        $this->assertTrue($object->hasAwesomeServiceSet());
    }
}
