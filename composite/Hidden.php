<?php


namespace Composite;


class Hidden extends Field  implements Renderable
{

    public function render(): string
    {
        // TODO: Implement render() method.
        return <<<ERT
<div class="form-group">
    <input type="hidden" name="{$this->getFiled()}">
</div>
ERT;
    }
}