<?php

namespace Facade;

class Screen extends InstanceAbstract
{
    public static $instance = null;

    public function down()
    {
        var_dump("放下幕布");
    }

    public function up()
    {
        var_dump("升起幕布");
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