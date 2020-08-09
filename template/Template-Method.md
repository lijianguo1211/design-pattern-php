### PHP设计模式之模板方法模式 Template Method

* 首先我们不说什么是模板方法模式，可以先看一个生活种的小例子，然后由生活中的小例子再来谈谈这个模板方法模式的实现。

> 生活中大家早上上班，如果不是自己做饭的，一般都是在外面买这吃的，一般买包子搭配豆浆，这个是最快捷而且省钱的一种搭配方式，那么包子老板做包子
一般分为几个步骤呢，一般都是先挑选紧致的面粉，然后会让面粉发酵，准备包包子的原材料，比如肉包子，韭菜包子，粉丝包子，海带包子，只要你能想的到，
老板都会满足你，包好包子之后，会把包子放在蒸笼里蒸熟，最后经过20-30分钟之后，包子就出笼了，顾客就买到了香喷喷的包子了。那么对于蒸包子来说，其
实这个步骤都是固定的，第一步：面粉发酵做成面团；第二步就是准备包包子的材料，这个材料是不固定的，有各种口味材料的包子；第三步也是固定的，烧水利
用水蒸气蒸包子，第四步：包子出笼

* 通过上面的蒸包子的案例，就可以使用程序来展示出来，我们首先需要一个抽象类，这个类就是`BunAbstract`它有一个对外提供的方法，`make()`方法,
主要的作用就是把后面的四个步骤整合到这个方法中，对外调用，剩下的蒸包子方法，可以分解为四个方法: 1.面粉发酵 2.选择添加材料 3.包包子 4.蒸包子 
5.出锅完成

```php
//面粉发酵
function flourFermentation(){}

//选择添加材料
function addMaterial(){}

//包包子
function steamedBuns(){}

//蒸包子 
function steamBuns(){}

//出锅
function outOfThePot(){}
```

* 完整的抽象包子类如下，对外提供的制作方法是不允许修改的，所以使用关键字 ``final``。包子的制作包馅的材料是不固定的，所以它是一个抽象方法，留
给继承者实现：

```php
abstract class BunAbstract
{
    final public function make()
    {
        $this->flourFermentation();

        $this->addMaterial();

        $this->steamedBuns();

        $this->steamBuns();

        $this->outOfThePot();
    }

    //面粉发酵
    function flourFermentation()
    {
        echo "开始计量面粉，制作面团，发酵" . PHP_EOL;
    }

    //选择添加材料
    abstract public function addMaterial();

    //包包子
    private function steamedBuns()
    {
        echo "材料准备完毕，开始包包子了" . PHP_EOL;
    }

    //蒸包子
    private function steamBuns()
    {
        echo "水烧开了，把包好的包子放入蒸笼中，蒸包子" . PHP_EOL;
    }

    //出锅
    private function outOfThePot()
    {
        echo "新鲜出笼的包子蒸好了，准备出笼了" . PHP_EOL;
    }
}
```

* 现在如果需要瘦肉馅的包子，就继承一个抽象包子类，来实现`addMaterial()`这个方法

```php
class LeanMeat extends BunAbstract
{

    public function addMaterial()
    {
        // TODO: Implement addMaterial() method.
        echo "准备瘦肉类材料" . PHP_EOL;
    }
}
```

* 再制作一个海带类的包子，就继承一个抽象包子类，来实现`addMaterial()`这个方法

```php
class Kelp extends BunAbstract
{
    public function addMaterial()
    {
        // TODO: Implement addMaterial() method.
        echo "准备海带类的材料" . PHP_EOL;
    }
}
```

最后的测试类：`Client`

```php
class Client
{
    public function __construct()
    {
        $test1 = new Kelp();

        $test1->make();

        $test2 = new LeanMeat();

        $test2->make();
    }
}

require "./../vendor/autoload.php";

new Client();
```

* 在模板模式（Template Pattern）中，一个抽象类公开定义了执行它的方法的方式/模板。它的子类可以按需要重写方法实现，但调用将以抽象类中定义的
方式进行。这种类型的设计模式属于行为型模式。

* 定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。模板方法使得子类可以不改变一个算法的结构即可重定义该算法的某些特定步骤。

优点： 1、封装不变部分，扩展可变部分。 2、提取公共代码，便于维护。 3、行为由父类控制，子类实现。