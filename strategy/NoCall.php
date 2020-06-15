<?php


namespace Strategy;


class NoCall implements CallInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        echo '我是一个不会叫的鸭子' . PHP_EOL;
    }
}