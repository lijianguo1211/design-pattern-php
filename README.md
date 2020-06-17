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

* 接口隔离

* 依赖倒置

* 里氏替换

* 开闭

* 迪米特

* 合成复用


