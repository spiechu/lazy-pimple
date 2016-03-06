<?php

namespace Spiechu\LazyPimple;

use Pimple\Container;

abstract class AbstractLazyPimpleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var callable
     */
    private $originalAutoloader;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->originalAutoloader = current(spl_autoload_functions());

        $this->assertInternalType('callable', $this->originalAutoloader);

        $this->container = require 'container_definition.php';

        $this->assertInstanceOf(Container::class, $this->container);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        foreach (spl_autoload_functions() as $autoload) {
            // preserve original autoloader
            if ($this->originalAutoloader === $autoload) {
                continue;
            }

            spl_autoload_unregister($autoload);
        }
    }
}
