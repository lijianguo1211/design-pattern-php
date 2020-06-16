<?php

namespace ChainOfResponsibilities;

class VicePrincipalSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() > 4500 && $this->request->getPrice() <= 10000) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是副校长' . PHP_EOL;
        } else {
            $this->requestHandle(new PrincipalSchool($this->request));
        }
    }
}