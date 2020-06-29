<?php


namespace Adapter\AdapterObject;


class Client
{
    public function __construct()
    {
        $china = new China();
        $adapter = new Adapter($china);

        $computer = new Computer();

        $computer->index($adapter);
    }
}

require "./../../vendor/autoload.php";

new Client();