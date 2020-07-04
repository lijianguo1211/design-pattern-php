<?php


namespace Bridge;


abstract class Phone
{
    protected $brand;

    public function __construct(BrandInterface $brand)
    {
        $this->brand = $brand;
    }

    public function open()
    {
        $this->brand->open();
    }

    public function close()
    {
        $this->brand->close();
    }

    public function call()
    {
        $this->brand->call();
    }
}