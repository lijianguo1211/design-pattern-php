<?php

namespace Visitor;

abstract class Person
{
    abstract public function accept(Action $action);
}