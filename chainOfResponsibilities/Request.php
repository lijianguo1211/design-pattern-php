<?php

namespace ChainOfResponsibilities;

class Request
{
    public $id = 0;

    public $price = 0;

    public $type = 1;

    public $desc = '';

    public function __construct(int $id = 0, int $price = 0, int $type = 1, string $desc = '')
    {
        $this->id = $id;

        $this->price = $price;

        $this->type = $type;

        $this->desc = $desc;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDesc()
    {
        return $this->desc;
    }
}