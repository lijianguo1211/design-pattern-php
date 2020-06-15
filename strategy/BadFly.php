<?php


namespace Strategy;


class BadFly implements FlyInterface
{

    public function fly()
    {
        // TODO: Implement fly() method.
        echo '我是一个飞的不怎么样的鸭子' . PHP_EOL;
    }
}