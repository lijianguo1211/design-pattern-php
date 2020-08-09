<?php

namespace Facade;

class Stereo extends InstanceAbstract
{
    public static $instance = null;

    public function on()
    {
        var_dump("打开音响");
    }

    public function off()
    {
        var_dump("关闭音响");
    }

    public function volumeUp()
    {
       var_dump("加大音量");
    }

    public function volumeDown()
    {
        var_dump("减小音量");
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