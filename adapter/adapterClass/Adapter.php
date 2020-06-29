<?php

namespace Adapter\AdapterClass;

class Adapter extends China implements UsaInterface
{

    public function outPut5V()
    {
        // TODO: Implement outPut5V() method.
        $chinaVoltage = $this->outPut220V();

        return $chinaVoltage / 2 + 10 . "V";
    }
}