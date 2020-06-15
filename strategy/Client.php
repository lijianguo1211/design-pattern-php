<?php


namespace Strategy;


class Client
{
    public function __construct()
    {
        $wildDuck = new WildDuck();

        $wildDuck->display('野鸭');
        $wildDuck->fly();
        $wildDuck->swim();
        $wildDuck->call();

        $yellowDuck = new YellowDuck();

        $yellowDuck->display('小黄鸭');
        $yellowDuck->fly();
        $yellowDuck->swim();
        $yellowDuck->call();
    }
}

require '../vendor/autoload.php';
new Client();