<?php

namespace ChainOfResponsibilities;

class Client
{
    public function __construct()
    {
        $request = new Request(mt_rand(1111, 9999), mt_rand(1, 99999), mt_rand(1, 9), '学校装修新电子教室');

        $clerk = new ClerkSchool($request);

        $clerk->processHandle();
    }
}

require '../vendor/autoload.php';
new Client();