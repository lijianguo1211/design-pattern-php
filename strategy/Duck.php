<?php


namespace Strategy;


abstract class Duck
{
    protected $fly = null;

    protected $call = null;

    protected $swim = null;
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
        echo "我是： " . $name . PHP_EOL;
    }

    public function call()
    {
        if (!is_null($this->call)) {
            $this->call->call();
        }

    }

    public function fly()
    {
        if (!is_null($this->fly)) {
            $this->fly->fly();
        }
    }

    public function swim()
    {
        if (!is_null($this->swim)) {
            $this->swim->swim();
        }
    }
}