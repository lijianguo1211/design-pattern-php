<?php


namespace Singleton;


class Config implements \ArrayAccess
{
    private $config = [];

    public function __construct()
    {
        $this->config = require __DIR__ . 'database.php';
    }

    public function get($key)
    {

    }

    public function set($key, $value)
    {

    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
        return array_key_exists($offset, $this->config);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.

    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}