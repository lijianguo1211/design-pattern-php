<?php


namespace Template;


class Client
{
    public function __construct()
    {
        $test1 = new Kelp();

        $test1->make();

        $test2 = new LeanMeat();

        $test2->make();
    }
}

require "./../vendor/autoload.php";

new Client();