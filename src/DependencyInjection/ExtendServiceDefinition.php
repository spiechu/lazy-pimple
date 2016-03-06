<?php

namespace Spiechu\LazyPimple\DependencyInjection;

class ExtendServiceDefinition
{
    /**
     * @var string
     */
    protected $serviceNameToInject;

    /**
     * @var string
     */
    protected $interfaceNameToHandle;

    /**
     * @var string
     */
    protected $methodNameToCall;

    /**
     * @param string $serviceNameToInject
     * @param string $interfaceNameToHandle
     * @param string $methodNameToCall
     */
    public function __construct($serviceNameToInject, $interfaceNameToHandle, $methodNameToCall)
    {
        $this->serviceNameToInject = $serviceNameToInject;
        $this->interfaceNameToHandle = $interfaceNameToHandle;
        $this->methodNameToCall = $methodNameToCall;
    }

    /**
     * @return string
     */
    public function getServiceNameToInject()
    {
        return $this->serviceNameToInject;
    }

    /**
     * @return string
     */
    public function getInterfaceNameToHandle()
    {
        return $this->interfaceNameToHandle;
    }

    /**
     * @return string
     */
    public function getMethodNameToCall()
    {
        return $this->methodNameToCall;
    }
}
