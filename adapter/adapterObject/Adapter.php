<?php


namespace Adapter\AdapterObject;



class Adapter implements UsaInterface
{
    protected $china;

    public function __construct(China $china)
    {
        $this->china = $china;
    }


    public function outPut5V()
    {
        // TODO: Implement outPut5V() method.
        $chinaVoltage = $this->china->outPut220V();

        return $chinaVoltage / 2 + 10 . "V";
    }
}