<?php

namespace Adapter\AdapterObject;

class China
{
    private $voltage = 220;

    public function outPut220V()
    {
        return $this->voltage;
    }
}