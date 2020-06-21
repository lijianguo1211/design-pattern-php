# design-pattern-php
学习PHP设计模式的相关记录

1. 什么是设计模式

>软件设计模式（Design pattern），又称设计模式，是一套被反复使用、多数人知晓的、经过分类编目的、代码设计经验的总结。使用设计模式是为了可重用
代码、让代码更容易被他人理解、保证代码可靠性、程序的重用性

为什么要使用设计模式，以上说的很明白，就是为了让代码可以复用，解除代码之间的高耦合低内聚，减少无用的代码。让一个项目增加可维护性，更加容易扩展，同时
也是使程序更加的健壮，更加的可靠，更加的灵活，知道了什么使设计模式，为什么要去使用设计模式，那么设计模式具体又怎么划分的呢？

* ps: 一般学习设计模式的时候都是，最开始什么是设计模式，那里有设计模式，原来这就是设计模式，我也要使用设计模式，哪儿都想使用设计模式，再一看
哪儿都使用不了设计模式，最后干脆哪儿都使用设计模式，到头来才发现，使用的设计模式哪儿哪儿都不合适，最后放弃了设计模式，写代码的惯性思维之后，不
知不觉用到了设计模式，自己也不知道使用了设计模式，原来这就是设计模式了。（就如倚天屠龙记里，张真人教张无忌太极，一开始全都记得，过一会，十之七
八，在一会，十之五六，在一会十之三四，在一会呢，全没了），就和这个道理一样，所以切记别急。

2. 设计模式大致可分为三大类

* 创建型

所谓创建型的设计模式，个人认为就是，以合适的的结构来创建一个对象，是属于从无到有的，通过以合适的方法，结构，形式来创建一个对象。对象的创建的基
本形式可能带来设计问题，或者增加了设计的复杂度，创建型的设计模式就是通过控制对象的创建方式（形式）来解决这个问题，比如经典（简单）的单例模式，
如果在一个程序中，经常使用一个类，每次使用它，都要`new`,而不间断的`new`同一个对象，这就造成了大量的资源浪费，刚好单例模式就可以解决这个问题

* 结构型

结构型的设计模式，就是从一个程序的结构上来操刀，让不同的类（对象）之间相互组合（结合），解决程序模块上的耦合问题，解释了如何将对象和类组装为
更大的结构，同时又保持结构的灵活性和效率。

* 行为型

将类（对象）与对象之间的交互，职责划分规定明确，负责有效的沟通以及对象之间的责任分配，比如观察者模式，这其中就定义了谁是观察者，谁是被观察者，
以及它们各自需要做的事情，安排的明明白白

3. 设计模式的六大原则

* 单一职责

简单来讲：对于一个类，那这一个类应该只负责一项职责

* ps 比如有一个学校，学校有学生，有老师，每个班级都有老师，通常来说，每个班级都有一个班主任负责，而除了班主任之外，还有这个班级的代课老师，每
一门学科都有一个专门的老师负责，语文-》语文老师，数学-》数学老师，英文-》英语老师，体育-》体育老师，等等。如果职责划分不清楚，一个老师负责一
个班级的所有课程，那么如果这个老师那一天有事情需要请假，那么这个老师的所有课程都没有办法正常上课了，如果这个老师只是负责当前班级的一门课程，那
他有事情的时候，还可以请假，又另外一个没有课程的老师代课。

```php
class Teacher
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function subject(string $class, string $subject)
    {
        echo '早上8:45，第一节课是' . $this->name . '老师正在给 （' . $class . '）班上'.$subject.'课' . PHP_EOL;
    }
}

$teacher = new Teacher('王');
$teacher->subject('一', '语文');

$teacher->subject('二', '数学');
$teacher->subject('三', '体育');
$teacher->subject('四', '英文');


//早上8:45，第一节课是王老师正在给 （一）班上语文课
//早上8:45，第一节课是王老师正在给 （二）班上数学课
//早上8:45，第一节课是王老师正在给 （三）班上体育课
//早上8:45，第一节课是王老师正在给 （四）班上英文课
```

* ps 再比如现在有一个交通工具的类，类里面有一个`run()`方法

```php
class TrafficTest
{
    public function run(string $name)
    {
        echo $name .  ' 在公路上行驶' . PHP_EOL;
    }
}
$traffic = new TrafficTest();
//汽车
$traffic->run('汽车');
//轮船
$traffic->run('轮船');
//飞机
$traffic->run('飞机');

/**
* 汽车 在公路上行驶
  轮船 在公路上行驶
  飞机 在公路上行驶
 */
```

这个`run()`方法接收不同的参数，不同的交通工具在里面都可以运行，但是结果却不是最好的，汽车是可以在公路上行驶，但是飞机是在空中飞的，轮船是在
水里的，都在公路上了，就不对了，这样的一个方法运行一个汽车就可以了，它做的太多了，结果却做不好，我们可以优化一下，让它只做一件事儿，比如方法一
`run()`方法不动，把它定义为一个接口，定义三个字类（汽车类，轮船类，飞机类）来实现这个`run()`方法，这样就是一个类作为单一行为来区分，这样更加
明确，但是唯一的缺点，要创建很多的不同类。方法二：在这个交通方法里，分别创建三个不同的方法，每个方法只做与它相关的事儿，比如下面这样，就可以保证
它们之间是不会相互影响的。

```php
class TrafficTest
{
    public function carRun()
    {
        echo '汽车在公路上行驶' . PHP_EOL;
    }

    public function aircraftRun()
    {
        echo '飞机在天空飞行' . PHP_EOL;
    }
    
    public function shipRun()
    {
        echo '轮船在大海里航行' . PHP_EOL;
    }
}

```

* 接口隔离

客户端不应该依赖它不需要的接口，即一个类对另外一个类的依赖应该建立在最小的接口上

比如我们有一个接口`BaseInterface`,里面定义了`index(), show(), edit(), update(), delete()`这五个接口

```php
interface BaseInterface 
{
    public function index();
    
    public function show();
    
    public function edit();
    
    public function update();
    
    public function delete();
}
```

现在有一个`Home`类，这个类是要去实现这个`BaseInterface`的接口，但是它只需要其中的一个方法`index()`,剩下的接口，它都不需要，但是它继承了
这个上一层的接口，就必须实现它里面的所有方法，所以必须有一个默认实现

```php
class Home implements BaseInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        echo '查看全部的入口' . PHP_EOL;
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
```

还有一个类`Post`这个是一个管理所有的文章的类，它需要去实现`BaseInterface`的除了`delete()`方法的所有接口

```php
class Post implements  BaseInterface
{

    public function index()
    {
        // TODO: Implement index() method.
        echo '查看文章列表' . PHP_EOL;
    }

    public function show()
    {
        // TODO: Implement show() method.
        echo '查看文章' . PHP_EOL;
    }

    public function edit()
    {
        // TODO: Implement edit() method.
        echo '编辑文章' . PHP_EOL;
    }

    public function update()
    {
        // TODO: Implement update() method.
        echo '更新文章' . PHP_EOL;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
```

最后一个管理员的类`Admin`也需要去实现`BaseInterface`的接口，而它是需要实现除了`index()`之外它所有的接口

```php
class Admin implements BaseInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
        echo '查看用户' . PHP_EOL;
    }

    public function edit()
    {
        // TODO: Implement edit() method.
        echo '编辑添加用户' . PHP_EOL;
    }

    public function update()
    {
        // TODO: Implement update() method.
        echo '修改用户' . PHP_EOL;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
        echo '删除用户' . PHP_EOL;
    }
}
```

这个时候，我们就会发现，`Home`类只需要`index()`方法，`Post`类需要除了`delete()`方法之外的所有方法，`Admin`类需要除了`index()`方法之外
的所有方法，里面有很多方法都是当前这个类所不需要的，但是，还是要去实现它，这样一来是一种浪费，资源的开销，二来也不符合设计模式的接口隔离原则，
是很不友好的。如果我们把`BaseInterface`这个接口分为三个小的接口，下面每个字类只需要去对应实现各自需要的接口，互不干扰，这样的话就会使程序看
起来很舒服，很安全，健壮。你如这样实现上面的例子：

```php
interface BaseInterface1
{
    public function index();
}

interface BaseInterface2 
{
    public function show();
    
    public function edit();
    
    public function update();
}

interface BaseInterface3
{
    public function delete();
}

class Home1 implements BaseInterface1
{

    public function index()
    {
        // TODO: Implement index() method.
    }
}

class Post1 implements BaseInterface1, BaseInterface2
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}

class Admin1 implements BaseInterface2, BaseInterface3
{

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}

```

* 依赖倒置

1. 高层模块不应该依赖底层模块，二者都应该依赖抽象

2. 抽象不应该依赖细节，细节应该依赖抽象

3. 依赖倒置的中心思想就是面向接口编程

4. 相对于细节的多变性，抽象比细节要稳定的多，以抽象搭建的东西比以细节搭建的东西稳定的的多，（抽象在这里可以抽象类，接口，细节就是具体实现类）

5. 使用抽象和接口的目的就是制定好规范，而不涉及具体的操作，把实现细节的任务交给具体的类去实现

比如现在有一个接收信息处理的类`Person`,里面有一个接受消息的方法`getInfo()`,这里是接受Emali的消息，所有我们把`Email`类作为参数传递进去

```php
class Email
{
    public function sendInfo()
    {
        echo '发送邮件消息' . PHP_EOL;
    }
}

class Person
{
    public function getInfo(Email $email)
    {
        $email->sendInfo();
    }
}
```

现在应为需求变化，`Person`类还要可以接收短信类的消息，这个时候，这个`getInfo()`方法因为是固定参数为Email,就代表现有的方法，是不能使用的，
要去修改`getInfo()`的参数，或者另外再加一个方法，这样做的话，就破坏了这个类的封装，没有一个好的扩展性，不利于维护，如果下次再加一个发送消息
的渠道，还要去修改，所有我们可以把所有发送消息的类型定义为一个接口，下面是各种消息类型的实现，而`getInfo()`方法也是去依赖这个接口，不是去依赖
具体的实现，不管以后要添加多少发送消息的种类，只需要去实现这个消息的接口就可以了，在接受消息类里面，我们是需要去改变一丝一毫的。比如：

```php
interface InfoInterface
{
    public function sendInfo();
}

class Email1 implements InfoInterface
{

    public function sendInfo()
    {
        // TODO: Implement sendInfo() method.
        echo '发送邮件消息' . PHP_EOL;
    }
}

class SMS implements InfoInterface
{

    public function sendInfo()
    {
        // TODO: Implement sendInfo() method.
        echo '发送短信消息' . PHP_EOL;
    }
}

class Person1
{
    public function getInfo(InfoInterface $info)
    {
        $info->sendInfo();
    }
}
```

依赖倒置的三种方式：1.通过接口依赖 2. 通过构造方法实现依赖 3. 同构`setAttritute()`方法实现依赖

* 里氏替换

1. 如果有一个类型为T1的对象obj1,它有一个类型为T2的对象obj2,换句话说就是obj2继承了obj1,当一个程序P在使用T1所定义的所有方法换成T2所有的方法的
时候，程序P的运行结果并没有改变，（行为没有改变，所有引用基类的地方都必须能够可以透明的使用其子类的对象）

2. 使用继承时，遵循里氏替换原则，在字类中尽量不要重写父类的方法

3. 里氏替换原则告诉我们，继承实际上是让两个类之间的耦合性增强了，在适当的情况下，可以通过组合，聚合，依赖来解决问题

* 开闭

1. 一个软件实体类，模块，函数应该对扩展开放（对提供方），对修改关闭（对使用方），用抽象构建框架，用实现扩展细节

2. 当软件变化的时候，尽量通过扩展软件实体类的行为来实现变化，而不是通过修改已有的代码来实现变化

3. 例子：设计一个画图的软件，可以画各种图形，

不好的实现：在添加另外一个画图方法的时候，首先需要先继承`Type`抽象类，设置一个`type`的类型，然后再在`Drawing`类里`drawing()`方法添加一个
`switch`类型，最后再加一个画图的方法，供它调用，需要修改的地方有很多。

```php
class OpenAndCloseTest
{
    public function __construct()
    {
        $drawing = new Drawing();
        $drawing->drawing(new Circular());
        $drawing->drawing(new triangle());
    }
}

class Drawing
{
    public function drawing(Type $type)
    {
        switch ($type->type) {
            case 1:
                $this->dropCircular();
                break;
            case 2:
                $this->dropTriangle();
                break;
        }
    }

    public function dropCircular()
    {
        echo "画圆形" . PHP_EOL;
    }

    public function dropTriangle()
    {
        echo "画三角形" . PHP_EOL;
    }
}

abstract class Type
{
    public $type;
}

class Circular extends Type
{
    public function __construct()
    {
        $this->type = 1;
    }
}

class triangle extends Type
{
    public function __construct()
    {
        $this->type = 2;
    }
}

new OpenAndCloseTest();
```

好的实现：各个画图的方法就是继承画图的基类，然后在各自类中自己实现，在画图的工具类中，也不需要再去加判断了，只需要调用画图的方法就好了，想要
画那个图形，在类外面传入进去就可以了，如果以后还想要扩展，也只需要去继承一个画图的基类，然后自己去实现，别的任何一个地方的代码都不需要修改

```php
class OpenAndCloseUpgradeTest
{
    public function __construct()
    {
        $drawingTest = new DrawingTest();

        $drawingTest->draw(new CircularTest());

        $drawingTest->draw(new triangleTest());
    }
}

class DrawingTest
{
    public function draw(TypeTest $draw)
    {
        $draw->drawing();
    }
}

abstract class TypeTest
{
    abstract public function drawing();
}

class CircularTest extends TypeTest
{

    public function drawing()
    {
        // TODO: Implement drawing() method.
        echo "画圆形" . PHP_EOL;
    }
}

class triangleTest extends TypeTest
{

    public function drawing()
    {
        // TODO: Implement drawing() method.
        echo "画三角形" . PHP_EOL;
    }
}

new OpenAndCloseUpgradeTest();
```

* 迪米特

1. 一个对象应该对其它对象保持最少的了解

2. 类与类关系越密切，耦合度越大

3. 迪米特法则又叫最少知道原则，即一个类对自己依赖的类知道的越少越好。对于被依赖的类不管多么复杂，都尽量将逻辑封装在类的内部，对爱只提供一个
`public`方法，不对外泄露任何信息

4. 只与直接的朋友通信（直接的朋友，成员变量，方法参数，方法返回值中的类为直接朋友，出现在局部变量中的类不是直接朋友）

* 合成复用

尽量使用合成/聚合方式来代替继承


