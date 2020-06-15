<?php


namespace Strategy;


class GoodFly implements FlyInterface
{

    public function fly()
    {
        // TODO: Implement fly() method.
        echo '我是一个飞的还可以的鸭子' . PHP_EOL;
    }
}