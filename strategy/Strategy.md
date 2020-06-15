### 策略模式 Strategy

1. 策略模式在分类上属于行为型

2. 现在有一个例子，比如有一只鸭子，有的鸭子是会飞的（野鸭），有的鸭子不会飞（家里养的鸭子），有的鸭子是会瓜瓜叫的，有的鸭子就不会叫（玩具鸭，
周黑鸭），有的鸭子会游泳（养的鸭子，野鸭），有的鸭子不会（周黑鸭，玩具鸭，小黄鸭）

3. 假如利用继承来实现，那就是先创建一个抽象类，然后野鸭，周黑鸭，家里养的鸭子，小黄鸭，玩具鸭，都要去继承我们的抽象类鸭子，

```php
<?php


namespace Strategy;


abstract class DuckTest
{
    /**
     * Notes:介绍鸭子
     * Name: display
     * User: LiYi
     * Date: 2020/6/15
     * Time: 23:44
     * @param string $name
     * @return mixed
     */
    public function display(string $name)
    {
        echo "我是： " . $name;
    }

    public function call()
    {
        echo '鸭子都会叫' . PHP_EOL;
    }

    public function fly()
    {
        echo '鸭子都会飞' . PHP_EOL;
    }

    public function swim()
    {
        echo '鸭子都会游泳' . PHP_EOL;
    }
}
```

4. 抽象类里有很多方法，可能对不同的鸭子，很多都不适用，那么就需要去重写它，每一个种类的鸭子都要去重写这个抽象类的方法，这样做，很不实用。那么
有没有一个办法不去重写这个抽象类呢，其实是有的。比如，还创建一个抽象类的鸭子,鸭子会不会飞，会不会叫，会不会游泳，这三个属性都把它作为一个接口

```php
<?php


namespace Strategy;


abstract class Duck
{
    protected $fly = null;

    protected $call = null;

    protected $swim = null;
    /**
     * Notes:介绍鸭子
     * Name: display
     * User: LiYi
     * Date: 2020/6/15
     * Time: 23:44
     * @param string $name
     * @return mixed
     */
    public function display(string $name)
    {
        echo "我是： " . $name . PHP_EOL;
    }

    public function call()
    {
        if (!is_null($this->call)) {
            $this->call->call();
        }

    }

    public function fly()
    {
        if (!is_null($this->fly)) {
            $this->fly->fly();
        }
    }

    public function swim()
    {
        if (!is_null($this->swim)) {
            $this->swim->swim();
        }
    }
}
```

5. 定义三个接口来描述鸭子的各种能力

```php
namespace Strategy;


interface CallInterface
{
    public function call();
}

interface FlyInterface
{
    public function fly();
}

interface SwimInterface
{
    public function swim();
}
```

6. 每种鸭子的能力都不相同，会飞的，不会飞的，飞的不怎样的，会叫的，不会叫的，叫不出来的，等等，每种能力都有各自的实现。

```php
class NoFly implements FlyInterface
{

    public function fly()
    {
        // TODO: Implement fly() method.
        echo "我是不会飞的鸭子" . PHP_EOL;
    }
}

class GoodFly implements FlyInterface
{

    public function fly()
    {
        // TODO: Implement fly() method.
        echo '我是一个飞的还可以的鸭子' . PHP_EOL;
    }
}

class BadFly implements FlyInterface
{

    public function fly()
    {
        // TODO: Implement fly() method.
        echo '我是一个飞的不怎么样的鸭子' . PHP_EOL;
    }
}

class GuaGuaCall implements CallInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        echo '我是一个呱呱叫的鸭子';
    }
}

class LowVoiceCall implements CallInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        echo '我只会小声叫的鸭子' . PHP_EOL;
    }
}

class NoCall implements CallInterface
{

    public function call()
    {
        // TODO: Implement call() method.
        echo '我是一个不会叫的鸭子' . PHP_EOL;
    }
}
```

7. 假如现在有一个野鸭，和一个小黄鸭，那么我们就可以根据鸭子的各自属性，来组合鸭子的各自能力，就不需要去重写抽象类的方法了

```php
class WildDuck extends Duck
{
    public function __construct()
    {
        $this->fly = new GoodFly();
        $this->call = new LowVoiceCall();
    }
}

class YellowDuck extends Duck
{
    public function __construct()
    {
        $this->fly = new BadFly();
        $this->call = new NoCall();
    }
}
```

8. 最后测试

```php
class Client
{
    public function __construct()
    {
        $wildDuck = new WildDuck();

        $wildDuck->display('野鸭');
        $wildDuck->fly();
        $wildDuck->swim();
        $wildDuck->call();

        $yellowDuck = new YellowDuck();

        $yellowDuck->display('小黄鸭');
        $yellowDuck->fly();
        $yellowDuck->swim();
        $yellowDuck->call();
    }
}

require '../vendor/autoload.php';
new Client();
/**
* 我是： 野鸭
  我是一个飞的还可以的鸭子
  我只会小声叫的鸭子
  我是： 小黄鸭
  我是一个飞的不怎么样的鸭子
  我是一个不会叫的鸭子
 */
```
