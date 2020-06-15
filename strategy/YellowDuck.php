<?php


namespace Strategy;


class YellowDuck extends Duck
{
    public function __construct()
    {
        $this->fly = new BadFly();
        $this->call = new NoCall();
    }
}