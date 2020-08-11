<?php

namespace Visitor;

class Success extends Action
{

    public function getManResult(Man $man)
    {
        // TODO: Implement getManResult() method.
        echo "man 给的评价很成功" . PHP_EOL;
    }

    public function getWomanResult(Woman $woman)
    {
        // TODO: Implement getWomanResult() method.
        echo "woman 给的评价很成功" . PHP_EOL;
    }
}