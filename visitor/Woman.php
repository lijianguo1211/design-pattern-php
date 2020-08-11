<?php

namespace Visitor;

/**
 * Notes:双分配，在客户端中，将具体的状态作为参数传递给woman中（第一次分派），然后woman类调用作为参数的 具体方法
 * 中方法getWomanResult，同式将自己（this）作为参数传递过去
 * User: LiYi
 * Date: 2020/8/10
 * Time: 22:15
 * Class Woman
 */
class Woman extends Person
{
    public function accept(Action $action)
    {
        // TODO: Implement accept() method.
        $action->getWomanResult($this);
    }
}