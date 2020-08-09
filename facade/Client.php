<?php


namespace Facade;



class Client
{
    public function __construct(HomeFacade $facade)
    {
        $facade->ready();

        $facade->play();

        $facade->pause();

        $facade->end();
    }
}

require "./../vendor/autoload.php";

new Client(new HomeFacade());