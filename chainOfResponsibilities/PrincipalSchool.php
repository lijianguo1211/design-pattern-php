<?php

namespace ChainOfResponsibilities;

class PrincipalSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() > 10000 && $this->request->getPrice() <= 50000) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是校长' . PHP_EOL;
        } else {
            echo '超出职责范围处理不了' . PHP_EOL;
        }
    }
}