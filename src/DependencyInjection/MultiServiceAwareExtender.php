<?php

namespace Spiechu\LazyPimple\DependencyInjection;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class MultiServiceAwareExtender implements ServiceProviderInterface
{
    /**
     * @var ExtendServiceDefinition[]
     */
    protected $extendServiceDefinitions;

    /**
     * @var string[]
     */
    protected $configuredServicesHash = [];

    /**
     * @param ExtendServiceDefinition[] $extendServiceDefinitions
     */
    public function __construct(array $extendServiceDefinitions)
    {
        $this->extendServiceDefinitions = $extendServiceDefinitions;
    }

    /**
     * {@inheritdoc}
     */
    public function register(Container $pimple)
    {
        foreach ($pimple->keys() as $serviceName) {
            $pimple->extend($serviceName, $this);
        }
    }

    /**
     * @param mixed     $service
     * @param Container $container
     *
     * @return mixed
     */
    public function __invoke($service, Container $container)
    {
        if (!is_object($service)) {
            return $service;
        }

        $objectHash = spl_object_hash($service);
        if (in_array($objectHash, $this->configuredServicesHash)) {
            return $service;
        }

        $this->configureService($service, $container);
        $this->configuredServicesHash[] = $objectHash;

        return $service;
    }

    /**
     * @param object    $service
     * @param Container $container
     */
    protected function configureService($service, Container $container)
    {
        foreach ($this->extendServiceDefinitions as $extendServiceDefinition) {
            $interfaceNameToInject = $extendServiceDefinition->getInterfaceNameToHandle();
            if (!$service instanceof $interfaceNameToInject) {
                continue;
            }

            $service->{$extendServiceDefinition->getMethodNameToCall()}($container[$extendServiceDefinition->getServiceNameToInject()]);
        }
    }
}
