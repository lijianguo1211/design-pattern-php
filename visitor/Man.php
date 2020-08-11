<?php

namespace Visitor;

class Man extends Person
{

    public function accept(Action $action)
    {
        // TODO: Implement accept() method.
        $action->getManResult($this);
    }
}