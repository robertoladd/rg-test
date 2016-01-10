<?php

namespace App\Library;

use Pimple\Container;

class ServiceContainer {

	private static $instance;
	
    protected $container;
	/**
     * Prevent external instances creation
     */
	protected function __construct(Container $container) {
        $this->container = $container;
    }

	/**
     * Prevent cloning
     */
	private function __clone(){}

	/**
     * Prevent unserializing
     */
	private function __wakeup(){}

	/**
     * Returns the *Singleton* instance of this class.
     *
     * @return ServiceContainer
     */
     
    public static function getInstance(Container $container = null)
    {
        if (null === static::$instance) {
            static::$instance = new static($container);
        }
        
        return static::$instance;
    }

    public function get($service) {

        return $this->container[$service];

    }

}