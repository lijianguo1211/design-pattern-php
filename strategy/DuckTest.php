<?php


namespace Strategy;


abstract class DuckTest
{
    /**
     * Notes:介绍鸭子
     * Name: display
     * User: LiYi
     * Date: 2020/6/15
     * Time: 23:44
     * @param string $name
     * @return mixed
     */
    public function display(string $name)
    {
        echo "我是： " . $name;
    }

    public function call()
    {
        echo '鸭子都会叫' . PHP_EOL;
    }

    public function fly()
    {
        echo '鸭子都会飞' . PHP_EOL;
    }

    public function swim()
    {
        echo '鸭子都会游泳' . PHP_EOL;
    }
}