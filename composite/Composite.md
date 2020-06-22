### PHP设计模式之组合模式 Composite

>组合模式（Composite Pattern），又叫部分整体模式，是用于把一组相似的对象当作一个单一的对象。组合模式依据树形结构来组合对象，用来表示部分以
及整体层次。这种类型的设计模式属于结构型模式，它创建了对象组的树形结构。


1. 使用过 `laravel-admin` 这个快速后台的同学，应该都使用过它的表单类 `Form` 创建表单的时候，只需要 `new Form`,然后添加对应的输出的表单
元素就可以了，很快捷，很方便，其实它就是使用了 **组合模式**

2. 根据以上的例子，首先需要定义一个输出的元素（组合元素）的接口 ``Renderable``它里面也之定义了一个方法 `render():string`类型的返回参数

```php
interface Renderable
{
    public function render():string;
}
```

3. 创建一个根元素`Form`类，实现接口 `Renderable`,在`render(): string`这个方法中，需要返回已经组建好的完整表单元素,在这个方法中我们稍微
做一下改进，我们需要定义两个成员变量，都是数组，一个是我们事先定义好的表单元素数组类，提供给我们最后调用表单方法的时候使用，还有一个提前定义
好的空数组，这个是我们最后组件完整表单的时候使用。最后再写一个魔术方法，调用我们的具体表单元素。

```php
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
```

4. 创建一些表单元素，也需要实现接口 ``Renderable``,在各自的`render(): string`方法中，返回当前创建的子表单，比如这里列举创建的`text, 
email, password`

```php
class Email extends Field  implements Renderable
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

class Text extends Field implements Renderable
{
    public function render(): string
    {
        // TODO: Implement render() method.
        return <<<ERT
<div class="form-group">
    <label for="{$this->getFiled()}">{$this->getFiled()}</label>
    <input type="text" id="{$this->getFiled()}" name="{$this->getFiled()}">
</div>
ERT;
    }
}

class Password extends Field implements Renderable
{

    public function render(): string
    {
        // TODO: Implement render() method.
        return <<<ERT
<div class="form-group">
    <label for="{$this->getFiled()}">{$this->getFiled()}</label>
    <input type="password" name="{$this->getFiled()}">
</div>
ERT;
    }
}
```

5. 测试，我们首先`new Form()`类，然后添加正常的表单元素，最后输出到页面上，得到一个完整的表单

```php
require '../vendor/autoload.php';

use Composite\Form;
//http://local.test.abc/
$form = new Form();

$form->text('username');

$form->password('password');

$form->email('email');
$form->number('number');
$form->file('file');
$form->hidden('hidden');

$style = <<<ERT
<style>
.form-group {
padding-bottom: 20px;
}
</style>
ERT;

echo $style;
echo $form->render();

/**
* <form action="./index.php" method="get"><div class="form-group">
      <label for="username">username</label>
      <input type="text" id="username" name="username">
  </div><div class="form-group">
      <label for="password">password</label>
      <input type="password" name="password">
  </div><div class="form-group">
      <label for="email">email</label>
      <input type="email" name="email">
  </div><div class="form-group">
      <label for="number">number</label>
      <input type="number" name="number">
  </div><div class="form-group">
      <label for="file">file</label>
      <input type="email" name="file">
  </div><div class="form-group">
      <input type="hidden" name="hidden">
  </div></form>
 */
```


