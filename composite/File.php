<?php


namespace Composite;


class File extends Field  implements Renderable
{

    public function render(): string
    {
        // TODO: Implement render() method.
        return <<<ERT
<div class="form-group">
    <label for="{$this->getFiled()}">{$this->getFiled()}</label>
    <input type="email" name="{$this->getFiled()}">
</div>
ERT;
    }
}