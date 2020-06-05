<?php

namespace LaravelEG\Laravel\AutoDeploy;

class Config implements \ArrayAccess
{
    private $container = [];

    public function __construct() {
        // Get config from laravel
        $config = config('laraveleg.autodeploy');

        // Set from larave config in container
        $this->container = $config;

        $this->container['payload_token'] = env('LARAVELEG_AUTODEPLOY_TOKEN', false);

        // Generate deploy command line
        $this->container['deploy'] = ['git', 'pull', $config['pull']['origin'], $config['pull']['branch_remote']];

        // check config have tasks or not
        if (!isset($config['tasks'])) {
            $this->container['tasks'] = [];
        }
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}