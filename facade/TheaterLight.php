<?php

namespace Facade;

class TheaterLight  extends InstanceAbstract
{
    public static $instance = null;

    public function on()
    {
        var_dump("打开灯光");
    }

    public function off()
    {
        var_dump("关闭灯光");
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