<?php

namespace ChainOfResponsibilities;

class DirectorSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() > 3000 && $this->request->getPrice() <= 4500) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是主任' . PHP_EOL;
        } else {
            $this->requestHandle(new VicePrincipalSchool($this->request));
        }
    }
}