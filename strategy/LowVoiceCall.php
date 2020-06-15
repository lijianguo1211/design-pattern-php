<?php


namespace Strategy;


class LowVoiceCall implements CallInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        echo '我只会小声叫的鸭子' . PHP_EOL;
    }
}