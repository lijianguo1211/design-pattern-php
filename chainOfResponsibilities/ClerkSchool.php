<?php

namespace ChainOfResponsibilities;

class ClerkSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() <= 3000) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是科员' . PHP_EOL;
        } else {
            $this->requestHandle(new DirectorSchool($this->request));
        }
    }
}