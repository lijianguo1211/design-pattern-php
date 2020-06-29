<?php


namespace Adapter\AdapterClass;


class Client
{
    public function __construct()
    {
        $adapter = new Adapter();
        $computer = new Computer();

        $computer->index($adapter);
    }
}
require "./../../vendor/autoload.php";
new Client();