<?php

namespace Facade;

class DvdPlayer extends InstanceAbstract
{
    public static $instance = null;

    public function on()
    {
        var_dump("打开 DVD");
    }

    public function off()
    {
        var_dump("关闭DVD");
    }

    public function play()
    {
        var_dump("开始播播放DVD");
    }

    public function suspend()
    {
        var_dump("暂停播放DVD");
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
