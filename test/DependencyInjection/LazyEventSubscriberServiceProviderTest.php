<?php

declare(strict_types=1);

use Spiechu\LazyPimple\AbstractLazyPimpleTest;
use Spiechu\LazyPimple\DependencyInjection\LazyEventSubscriberServiceProvider;

class LazyEventSubscriberServiceProviderTest extends AbstractLazyPimpleTest
{
    public function testBadEventDispatcherProvided(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('/bad_event_dispatcher.{0,}stdClass.{0,}EventDispatcherInterface/i');

        $this->container->register(new LazyEventSubscriberServiceProvider(
            $this->container['lazy_service_factory'],
            'bad_event_dispatcher',
            []
        ));
    }
}
