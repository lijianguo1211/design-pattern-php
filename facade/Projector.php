<?php

namespace Facade;

class Projector extends InstanceAbstract
{
    public static $instance = null;

    public function on()
    {
        var_dump("打开投影仪");
    }

    public function off()
    {
        var_dump("关闭投影仪");
    }

    public static function getInstance()
    {
        // TODO: Implement getInstance() method.
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }
}