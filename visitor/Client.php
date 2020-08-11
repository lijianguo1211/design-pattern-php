<?php

namespace Visitor;

class Client
{
    public function __construct()
    {
        $object = new ObjectStructure();
        $object->attach(new Man());
        $object->attach(new Man());
        $object->attach(new Woman());

        $success = new Success();

        $error = new Fail();
        $object->display($error);
        $object->display($success);
    }
}

require './../vendor/autoload.php';

new Client();
