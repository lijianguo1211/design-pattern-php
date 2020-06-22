<?php


namespace Composite;


class Radio extends Field implements Renderable
{

    public function render(): string
    {
        // TODO: Implement render() method.
        return <<<ERT
<div class="form-group">
    <label for="{$this->getFiled()}">{$this->getFiled()}</label>
    <input type="radio" name="{$this->getFiled()}">
</div>
ERT;
    }
}