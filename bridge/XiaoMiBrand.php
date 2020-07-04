<?php


namespace Bridge;


class XiaoMiBrand implements BrandInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        printf("小米手机打电话\n");
    }

    public function open()
    {
        // TODO: Implement open() method.
        printf("小米手机开机\n");
    }

    public function close()
    {
        // TODO: Implement close() method.
        printf("小米手机关机\n");
    }
}