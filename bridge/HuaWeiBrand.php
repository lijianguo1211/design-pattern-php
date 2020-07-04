<?php


namespace Bridge;


class HuaWeiBrand implements BrandInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        printf("华为手机打电话\n");
    }

    public function open()
    {
        // TODO: Implement open() method.
        printf("华为手机开机\n");
    }

    public function close()
    {
        // TODO: Implement close() method.
        printf("华为手机关机\n");
    }
}