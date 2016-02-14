# Lazy Pimple

Lazy service definitions for Pimple DI container.

Travis build status:
[![Build Status](https://travis-ci.org/spiechu/lazy-pimple.svg?branch=master)](https://travis-ci.org/spiechu/lazy-pimple)

## Installation

When using Pimple DIC, there is sometimes need to lazy load service and instantiate it only when needed.
What's more, there is also possibility to lazy load event subscribers. (Now you'll see why `\Symfony\Component\EventDispatcher\EventSubscriberInterface` has static interface).

With use of this library, you can easy lazy load Pimple service definitions unless they're needed.

```php
<?php
// imgine awesome service is expensive and should be lazy loaded
$pimpleContainer['awesome_service'] = function(Container $container) {
  return $container['lazy_service_factory']->getLazyServiceDefinition(AwesomeService::class, function() {
    return new AwesomeService();
  });
};
```
