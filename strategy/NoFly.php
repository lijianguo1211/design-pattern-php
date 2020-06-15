<?php


namespace Strategy;


class NoFly implements FlyInterface
{

    public function fly()
    {
        // TODO: Implement fly() method.
        echo "我是不会飞的鸭子" . PHP_EOL;
    }
}