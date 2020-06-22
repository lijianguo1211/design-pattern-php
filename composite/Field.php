<?php


namespace Composite;


class Field
{
    protected $field;

    public function setField(string $field):self
    {
        $this->field = $field;

        return $this;
    }

    public function getFiled():string
    {
        return $this->field;
    }
}