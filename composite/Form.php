<?php

namespace Composite;

class Form implements Renderable
{
    private $action = './index.php';

    private $method = 'get';

    protected $elements = [
        'text' => Text::class,
        'email' => Email::class,
        'password' => Password::class,
        'file' => File::class,
        'radio' => Radio::class,
        'number' => Number::class,
        'hidden' => Hidden::class,
    ];

    protected $items = [];

    public function addElements(string $formName, Renderable $renderable)
    {
        if (!isset($this->elements[$formName])) {
            $this->elements[$formName] = $renderable;
        }
    }

    public function setAction(string $action)
    {
        $this->action = $action;

        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function render(): string
    {
        // TODO: Implement render() method.
        $formString = <<<ERT
<form action="{$this->getAction()}" method="{$this->getMethod()}">
ERT;

        foreach ($this->items as $item) {
            $formString .= $item;
        }

        $formString .= <<<TRE
</form>
TRE;

        return $formString;

    }

    public function pushField(string $fields)
    {
        $this->items[] = $fields;

        return $this;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        if (!isset($this->elements[$name])) {
            $message = sprintf('this is method %s not exists!', $name);
            throw new RunException($message);
        }

        $class = $this->elements[$name];

        $class = new $class;

        if (is_array($arguments)) {
            $field = $arguments[0];
        } else {
            $field = (string) mt_rand(100, 999);
        }

        $formText = $class->setField($field)->render();

        $this->pushField($formText);

        return $this;
    }
}