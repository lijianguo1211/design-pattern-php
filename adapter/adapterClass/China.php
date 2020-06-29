<?php
/**
 * 被适配者
 */

namespace Adapter\AdapterClass;

class China
{
    private $voltage = 220;

    public function outPut220V()
    {
        return $this->voltage;
    }
}