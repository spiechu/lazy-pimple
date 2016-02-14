<?php

namespace ProxyManagerGeneratedProxy\__PM__\Spiechu\LazyPimple\FirstSubscriber;

class Generated6ffb822320047ee8a0b5b0d172ad373a extends \Spiechu\LazyPimple\FirstSubscriber implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder56c085c743353378220831 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer56c085c743651575526588 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties56c085c741e2d925399932 = array(
        
    );

    private static $signature6ffb822320047ee8a0b5b0d172ad373a = 'YTozOntzOjk6ImNsYXNzTmFtZSI7czozNDoiU3BpZWNodVxMYXp5UGltcGxlXEZpcnN0U3Vic2NyaWJlciI7czo3OiJmYWN0b3J5IjtzOjUwOiJQcm94eU1hbmFnZXJcRmFjdG9yeVxMYXp5TG9hZGluZ1ZhbHVlSG9sZGVyRmFjdG9yeSI7czoxOToicHJveHlNYW5hZ2VyVmVyc2lvbiI7czo1OiIxLjAuMCI7fQ==';

    /**
     * {@inheritDoc}
     */
    public function onFirst(\Symfony\Component\EventDispatcher\Event $event)
    {
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, 'onFirst', array('event' => $event), $this->initializer56c085c743651575526588);

        return $this->valueHolder56c085c743353378220831->onFirst($event);
    }

    /**
     * @override constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public function __construct($initializer)
    {
        $this->initializer56c085c743651575526588 = $initializer;
    }

    /**
     * @param string $name
     */
    public function & __get($name)
    {
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, '__get', array('name' => $name), $this->initializer56c085c743651575526588);

        if (isset(self::$publicProperties56c085c741e2d925399932[$name])) {
            return $this->valueHolder56c085c743353378220831->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c085c743353378220831;

            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }

        $targetObject = $this->valueHolder56c085c743353378220831;
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
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer56c085c743651575526588);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c085c743353378220831;

            return $targetObject->$name = $value;;
            return;
        }

        $targetObject = $this->valueHolder56c085c743353378220831;
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
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, '__isset', array('name' => $name), $this->initializer56c085c743651575526588);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c085c743353378220831;

            return isset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder56c085c743353378220831;
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
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, '__unset', array('name' => $name), $this->initializer56c085c743651575526588);

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56c085c743353378220831;

            unset($targetObject->$name);;
            return;
        }

        $targetObject = $this->valueHolder56c085c743353378220831;
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
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, '__clone', array(), $this->initializer56c085c743651575526588);

        $this->valueHolder56c085c743353378220831 = clone $this->valueHolder56c085c743353378220831;
    }

    public function __sleep()
    {
        $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, '__sleep', array(), $this->initializer56c085c743651575526588);

        return array('valueHolder56c085c743353378220831');
    }

    public function __wakeup()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer56c085c743651575526588 = $initializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyInitializer()
    {
        return $this->initializer56c085c743651575526588;
    }

    /**
     * {@inheritDoc}
     */
    public function initializeProxy()
    {
        return $this->initializer56c085c743651575526588 && $this->initializer56c085c743651575526588->__invoke($this->valueHolder56c085c743353378220831, $this, 'initializeProxy', array(), $this->initializer56c085c743651575526588);
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder56c085c743353378220831;
    }

    /**
     * {@inheritDoc}
     */
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder56c085c743353378220831;
    }


}
