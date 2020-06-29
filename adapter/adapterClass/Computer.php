<?php

/**
 * 用户
 */

namespace Adapter\AdapterClass;


class Computer
{
    public function index(UsaInterface $usa)
    {
        if ($usa->outPut5V() === "120V") {
            printf("可以在美国使用中国的电源插头给电脑充电了");
        } else {
            printf("不可以在美国使用中国的电源插头给电脑充电了");
        }
    }
}