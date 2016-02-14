<?php

namespace ProxyManagerGeneratedProxy\__PM__\Spiechu\LazyPimple\Service\AwesomeService;

class Generatedfc5d1f433471af86809ee9bc128dcbb0 extends \Spiechu\LazyPimple\Service\AwesomeService implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder56c08c4c00d42509687148 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer56c08c4c01401721371485 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties56c08c4bf2675674290623 = array(
        
    );

    private static $signaturefc5d1f433471af86809ee9bc128dcbb0 = 'YTozOntzOjk6ImNsYXNzTmFtZSI7czo0MToiU3BpZWNodVxMYXp5UGltcGxlXFNlcnZpY2VcQXdlc29tZVNlcnZpY2UiO3M6NzoiZmFjdG9yeSI7czo1MDoiUHJveHlNYW5hZ2VyXEZhY3RvcnlcTGF6eUxvYWRpbmdWYWx1ZUhvbGRlckZhY3RvcnkiO3M6MTk6InByb3h5TWFuYWdlclZlcnNpb24iO3M6NToiMS4wLjAiO30=';

    /**
     * {@inheritDoc}
     */
    public function instanceHit()
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, 'instanceHit', array(), $this->initializer56c08c4c01401721371485);

        return $this->valueHolder56c08c4c00d42509687148->instanceHit();
    }

    /**
     * @override constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public function __construct($initializer)
    {
        $this->initializer56c08c4c01401721371485 = $initializer;
    }

    /**
     * @param string $name
     */
    public function & __get($name)
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, '__get', array('name' => $name), $this->initializer56c08c4c01401721371485);

        if (isset(self::$publicProperties56c08c4bf2675674290623[$name])) {
            return $this->valueHolder56c08c4c00d42509687148->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c08c4c00d42509687148;

            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }

        $targetObject = $this->valueHolder56c08c4c00d42509687148;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer56c08c4c01401721371485);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c08c4c00d42509687148;

            return $targetObject->$name = $value;;
            return;
        }

        $targetObject = $this->valueHolder56c08c4c00d42509687148;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __isset($name)
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, '__isset', array('name' => $name), $this->initializer56c08c4c01401721371485);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c08c4c00d42509687148;

            return isset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder56c08c4c00d42509687148;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __unset($name)
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, '__unset', array('name' => $name), $this->initializer56c08c4c01401721371485);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c08c4c00d42509687148;

            unset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder56c08c4c00d42509687148;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, '__clone', array(), $this->initializer56c08c4c01401721371485);

        $this->valueHolder56c08c4c00d42509687148 = clone $this->valueHolder56c08c4c00d42509687148;
    }

    public function __sleep()
    {
        $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, '__sleep', array(), $this->initializer56c08c4c01401721371485);

        return array('valueHolder56c08c4c00d42509687148');
    }

    public function __wakeup()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer56c08c4c01401721371485 = $initializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyInitializer()
    {
        return $this->initializer56c08c4c01401721371485;
    }

    /**
     * {@inheritDoc}
     */
    public function initializeProxy()
    {
        return $this->initializer56c08c4c01401721371485 && $this->initializer56c08c4c01401721371485->__invoke($this->valueHolder56c08c4c00d42509687148, $this, 'initializeProxy', array(), $this->initializer56c08c4c01401721371485);
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder56c08c4c00d42509687148;
    }

    /**
     * {@inheritDoc}
     */
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder56c08c4c00d42509687148;
    }


}
