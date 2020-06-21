<?php


namespace Test;


class OpenAndCloseUpgradeTest
{
    public function __construct()
    {
        $drawingTest = new DrawingTest();

        $drawingTest->draw(new CircularTest());

        $drawingTest->draw(new triangleTest());
    }
}

class DrawingTest
{
    public function draw(TypeTest $draw)
    {
        $draw->drawing();
    }
}

abstract class TypeTest
{
    abstract public function drawing();
}

class CircularTest extends TypeTest
{

    public function drawing()
    {
        // TODO: Implement drawing() method.
        echo "画圆形" . PHP_EOL;
    }
}

class triangleTest extends TypeTest
{

    public function drawing()
    {
        // TODO: Implement drawing() method.
        echo "画三角形" . PHP_EOL;
    }
}

new OpenAndCloseUpgradeTest();