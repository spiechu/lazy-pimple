# Lazy Pimple

Lazy service definitions for [Pimple DI container](http://pimple.sensiolabs.org/).

Travis build status:
[![Build Status](https://travis-ci.org/spiechu/lazy-pimple.svg?branch=master)](https://travis-ci.org/spiechu/lazy-pimple)

## Intro

When using Pimple DIC, there is sometimes need to lazy load service and instantiate it only when needed.
What's more, there is also possibility to lazy load event subscribers. (Now you'll see why `\Symfony\Component\EventDispatcher\EventSubscriberInterface` has static interface).

Under the hood this library uses [Proxy Manager](https://github.com/Ocramius/ProxyManager). Object's proxy is firstly generated. Until instance method call is needed, the proxy is being used. This means even static calls don't need object's instance and are called by proxy.

## Installation

Simplest way is to add `"spiechu/lazy-pimple": "~0.1"` to your `composer.json`.

The minimal configuration for lazy loads to work is to add two definitions to your Pimple:

```php

<?php

$pimpleContainer['lazy_loading_value_holder_factory_factory'] = function(Container $container) {
  return (new \Spiechu\LazyPimple\Factory\LazyLoadingValueHolderFactoryFactory())
    ->getFactory();
};

$pimpleContainer['lazy_service_factory'] = function(Container $container) {
  return new \Spiechu\LazyPimple\Factory\LazyServiceFactory($container['lazy_loading_value_holder_factory_factory']);
};
```

In order to use ProxyManager proxy cache, `LazyLoadingValueHolderFactoryFactory->getFactory()` accepts dir path to writable space where it can dump generated proxy class definitions. You can see how to do it in the full listing at the bottom of this page.

## Usage

### Lazy services

With use of this library, you can easy lazy load Pimple service definitions until they're needed.

```php
<?php

// imgine awesome service is expensive and should be lazy loaded
$pimpleContainer['awesome_service'] = function(Container $container) {
  return $container['lazy_service_factory']->getLazyServiceDefinition(AwesomeService::class, function() {
    return new AwesomeService();
  });
};
```

### Lazy event subscribers

We'll start with typical event subscriber definition.

```php
<?php

$pimpleContainer['first_subscriber'] = function(Container $container) {
  // subscriber has no idea it will be lazy loaded
  return new FirstSubscriber($container['awesome_service']);
};
```

Now by using `\Pimple\ServiceProviderInterface` service provider we can transform subscribers into lazy loaded.

```php
<?php

$pimpleContainer->register(new LazyEventSubscriberServiceProvider(
  $pimpleContainer['lazy_service_factory'],
    // we're defining which service resolves to EventDispatcher
    'event_dispatcher',
    [
      // we're defining subscribers
      'first_subscriber' => FirstSubscriber::class,
    ]
));
```

This way only when event actually took place, subscriber is instantiated and event handle method called.

### Example Pimple service definition (taken from my "tests").

```php
<?php

use Pimple\Container;
use Spiechu\LazyPimple\DependencyInjection\LazyEventSubscriberServiceProvider;
use Spiechu\LazyPimple\Factory\LazyLoadingValueHolderFactoryFactory;
use Spiechu\LazyPimple\Factory\LazyServiceFactory;
use Spiechu\LazyPimple\FirstSubscriber;
use Spiechu\LazyPimple\Service\AnotherService;
use Spiechu\LazyPimple\Service\AwesomeService;
use Spiechu\LazyPimple\Service\EventEmittingService;
use Symfony\Component\EventDispatcher\EventDispatcher;

// prevent leaking any variables into global namespace
return call_user_func(function() {
  require_once './vendor/autoload.php';

  $pimpleContainer = new Container();
    
  $pimpleContainer['proxy_manager_cache_target_dir'] = function(Container $container) {
    $targetDir = __DIR__ . '/proxy_cache_dir';

    if (!is_dir($targetDir)) {
      mkdir($targetDir, 0775, true);
    }

    return $targetDir;
  };

  $pimpleContainer['lazy_loading_value_holder_factory_factory'] = function(Container $container) {
    return (new LazyLoadingValueHolderFactoryFactory())
      ->getFactory($container['proxy_manager_cache_target_dir']);
  };
    
  $pimpleContainer['lazy_service_factory'] = function(Container $container) {
    return new LazyServiceFactory($container['lazy_loading_value_holder_factory_factory']);
  };

  $pimpleContainer['event_dispatcher'] = function(Container $container) {
    return new EventDispatcher();
  };

  // imgine awesome service is expensive and should be lazy loaded
  $pimpleContainer['awesome_service'] = function(Container $container) {
    return $container['lazy_service_factory']->getLazyServiceDefinition(AwesomeService::class, function() {
      return new AwesomeService();
    });
  };

  $pimpleContainer['another_service'] = function(Container $container) {
    // this one will receive proxy object
    return new AnotherService($container['awesome_service']);
  };

  $pimpleContainer['event_emitting_service'] = function(Container $container) {
    return new EventEmittingService($container['event_dispatcher']);
  };

  $pimpleContainer['first_subscriber'] = function(Container $container) {
    // subscriber has no idea it will be lazy loaded
    return new FirstSubscriber($container['awesome_service']);
  };

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
```
