<?php

namespace ChainOfResponsibilities;

abstract class RequestHandleAbstract
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Notes:指向下一个请求
     * Name: requestHandle
     * User: LiYi
     * Date: 2020/6/16
     * Time: 22:20
     * @param RequestHandleAbstract $abstract
     * @return mixed
     */
    final public function requestHandle(RequestHandleAbstract $abstract)
    {
        $abstract->processHandle();
    }

    /**
     * Notes:具体的处理请求程序
     * Name: processHandle
     * User: LiYi
     * Date: 2020/6/16
     * Time: 22:21
     * @return mixed
     */
    abstract public function processHandle();
}