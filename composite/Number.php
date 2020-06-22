<?php


namespace Composite;


class Number extends Field implements Renderable
{

    public function render(): string
    {
        // TODO: Implement render() method.
        return <<<ERT
<div class="form-group">
    <label for="{$this->getFiled()}">{$this->getFiled()}</label>
    <input type="number" name="{$this->getFiled()}">
</div>
ERT;
    }
}