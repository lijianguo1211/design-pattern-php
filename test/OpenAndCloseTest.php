<?php


namespace Test;


class OpenAndCloseTest
{
    public function __construct()
    {
        $drawing = new Drawing();
        $drawing->drawing(new Circular());
        $drawing->drawing(new triangle());
    }
}

class Drawing
{
    public function drawing(Type $type)
    {
        switch ($type->type) {
            case 1:
                $this->dropCircular();
                break;
            case 2:
                $this->dropTriangle();
                break;
        }
    }

    public function dropCircular()
    {
        echo "画圆形" . PHP_EOL;
    }

    public function dropTriangle()
    {
        echo "画三角形" . PHP_EOL;
    }
}

abstract class Type
{
    public $type;
}

class Circular extends Type
{
    public function __construct()
    {
        $this->type = 1;
    }
}

class triangle extends Type
{
    public function __construct()
    {
        $this->type = 2;
    }
}

new OpenAndCloseTest();

