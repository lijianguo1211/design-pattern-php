<?php

namespace Template;

abstract class BunAbstract
{
    final public function make()
    {
        $this->flourFermentation();

        $this->addMaterial();

        $this->steamedBuns();

        $this->steamBuns();

        $this->outOfThePot();
    }

    //面粉发酵
    function flourFermentation()
    {
        echo "开始计量面粉，制作面团，发酵" . PHP_EOL;
    }

    //选择添加材料
    abstract public function addMaterial();

    //包包子
    private function steamedBuns()
    {
        echo "材料准备完毕，开始包包子了" . PHP_EOL;
    }

    //蒸包子
    private function steamBuns()
    {
        echo "水烧开了，把包好的包子放入蒸笼中，蒸包子" . PHP_EOL;
    }

    //出锅
    private function outOfThePot()
    {
        echo "新鲜出笼的包子蒸好了，准备出笼了" . PHP_EOL;
    }
}