<?php

namespace Visitor;

abstract class Action
{
    abstract public function getManResult(Man $man);

    abstract public function getWomanResult(Woman $woman);
}