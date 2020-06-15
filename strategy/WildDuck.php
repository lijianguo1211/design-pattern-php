<?php


namespace Strategy;


class WildDuck extends Duck
{
    public function __construct()
    {
        $this->fly = new GoodFly();
        $this->call = new LowVoiceCall();
    }
}