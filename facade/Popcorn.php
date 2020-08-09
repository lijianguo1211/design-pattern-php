<?php

namespace Facade;

class Popcorn extends InstanceAbstract
{
    public static $instance = null;

    public function on()
    {
        var_dump("打开爆米花机");
    }
    
    public function off()
    {
        var_dump("关闭爆米花机");
    }

    public function make()
    {
        var_dump("制作爆米花");
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