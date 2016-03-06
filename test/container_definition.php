<?php

use Pimple\Container;
use Spiechu\LazyPimple\DependencyInjection\ExtendServiceDefinition;
use Spiechu\LazyPimple\DependencyInjection\LazyEventSubscriberServiceProvider;
use Spiechu\LazyPimple\DependencyInjection\MultiServiceAwareExtender;
use Spiechu\LazyPimple\Factory\LazyLoadingValueHolderFactoryFactory;
use Spiechu\LazyPimple\Factory\LazyServiceFactory;
use Spiechu\LazyPimple\FirstSubscriber;
use Spiechu\LazyPimple\Service\AnotherService;
use Spiechu\LazyPimple\Service\AwesomeService;
use Spiechu\LazyPimple\Service\EventEmittingService;
use Spiechu\LazyPimple\ServiceToExtend\AwesomeServiceAwareClass;
use Spiechu\LazyPimple\ServiceToExtend\AwesomeServiceAwareInterface;
use Spiechu\LazyPimple\ServiceToExtend\BothInterfacesAwareClass;
use Spiechu\LazyPimple\ServiceToExtend\EventDispatcherAwareInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

// prevent leaking any variables into global namespace
return call_user_func(function () {
    $pimpleContainer = new Container();

    $pimpleContainer['proxy_manager_cache_target_dir'] = function (Container $container) {
        $targetDir = __DIR__.'/proxy_cache_dir';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        return $targetDir;
    };

    $pimpleContainer['lazy_loading_value_holder_factory_factory'] = function (Container $container) {
        return (new LazyLoadingValueHolderFactoryFactory())
            ->getFactory($container['proxy_manager_cache_target_dir']);
    };

    $pimpleContainer['lazy_service_factory'] = function (Container $container) {
        return new LazyServiceFactory($container['lazy_loading_value_holder_factory_factory']);
    };

    $pimpleContainer['event_dispatcher'] = function (Container $container) {
        return new EventDispatcher();
    };

    // imgine awesome service is expensive and should be lazy loaded
    $pimpleContainer['awesome_service'] = function (Container $container) {
        return $container['lazy_service_factory']->getLazyServiceDefinition(AwesomeService::class, function () {
            return new AwesomeService();
        });
    };

    $pimpleContainer['another_service'] = function (Container $container) {
        // this one will receive proxy object
        return new AnotherService($container['awesome_service']);
    };

    $pimpleContainer['event_emitting_service'] = function (Container $container) {
        return new EventEmittingService($container['event_dispatcher']);
    };

    $pimpleContainer['first_subscriber'] = function (Container $container) {
        // subscriber has no idea it will be lazy loaded
        return new FirstSubscriber($container['awesome_service']);
    };

    $pimpleContainer['awesome_service_aware'] = function (Container $container) {
        return new AwesomeServiceAwareClass();
    };

    $pimpleContainer['both_interfaces_aware'] = function (Container $container) {
        return new BothInterfacesAwareClass();
    };

    $pimpleContainer->register(new MultiServiceAwareExtender([
        new ExtendServiceDefinition('awesome_service', AwesomeServiceAwareInterface::class, 'setAwesomeService'),
        new ExtendServiceDefinition('event_dispatcher', EventDispatcherAwareInterface::class, 'setEventDispatcher'),
    ]));

    $pimpleContainer->register(new LazyEventSubscriberServiceProvider(
        $pimpleContainer['lazy_service_factory'],
        // we're defining which service resolves to EventDispatcher
        'event_dispatcher',
        [
            // we're defining subscribers
            'first_subscriber' => FirstSubscriber::class,
        ]
    ));

    return $pimpleContainer;
});
