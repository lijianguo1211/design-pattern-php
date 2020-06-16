### 责任链模式 Chain Of Responsibilities

>顾名思义，责任链模式（Chain of Responsibility Pattern）为请求创建了一个接收者对象的链。这种模式给予请求的类型，对请求的发送者和接收者进
行解耦。这种类型的设计模式属于行为型模式。在这种模式中，通常每个接收者都包含对另一个接收者的引用。如果一个对象不能处理该请求，那么它会把相同的
请求传给下一个接收者，依此类推。

1. 责任链模式也是属于行为型模式

2. 责任链模式是有一个请求类，一个请求处理者抽象类，然后有多个请求处理者字类去处理请求

3. 比如现在有一个场景，有一个学校，学校平时需要采购一些物品，比如粉笔，黑板擦，垃圾桶，扫帚，大一点的物品，智能课堂的电子设备，学生桌椅的报修，
周围环境的装修呀，老师的备课用品呀等等，一些小的物品，比如3000元一下的，可能一个管后勤的小科员就可以直接签字同意，一些3000-4500元的物品，就
需要主任来签字同意了，再大一点的4500-10000就需要副校长签字同意了，那么再大一点10000-50000的就需要校长来签字了，大于50000的就需要教育局来
报备了，就不是学校可以自行决定的了。

4. 根据3的物理场景，就可以使用职责链模式了，购买物品就是一个请求，需要对应的请求处理者（小科员，主任，副校长，校长）来处理。

5. 比如请求处理，可以定义一个请求类，`Request`,可以把请求类做成一个接口，然后去实现它，这里只是做实验，就只作一个类，不去些接口了

```php
class Request
{
    public $id = 0;

    public $price = 0;

    public $type = 1;

    public $desc = '';

    public function __construct(int $id = 0, int $price = 0, int $type = 1, string $desc = '')
    {
        $this->id = $id;

        $this->price = $price;

        $this->type = $type;

        $this->desc = $desc;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDesc()
    {
        return $this->desc;
    }
}
```

6. 定义一个请求处理抽象类，这个抽象类定义三个方法，一个是`__construct(Request $request)`,它接受一个请求类`Request`,
第二个方法是`final public function requestHandle(RequestHandleAbstract $abstract)`,它会接受一个自身的抽象类参数，把当前处理者处理
不了的问题，指向下一个处理者，第三个方法就是当前的处理者的具体操作`abstract public function processHandle();`它是一个抽象方法

```php
abstract class RequestHandleAbstract
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Notes:指向下一个请求
     * Name: requestHandle
     * User: LiYi
     * Date: 2020/6/16
     * Time: 22:20
     * @param RequestHandleAbstract $abstract
     * @return mixed
     */
    final public function requestHandle(RequestHandleAbstract $abstract)
    {
        $abstract->processHandle();
    }

    /**
     * Notes:具体的处理请求程序
     * Name: processHandle
     * User: LiYi
     * Date: 2020/6/16
     * Time: 22:21
     * @return mixed
     */
    abstract public function processHandle();
}
```

7. 分别定义科员，主任，父校长，校长的处理请求的具体实现类

```php
class ClerkSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() <= 3000) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是科员' . PHP_EOL;
        } else {
            $this->requestHandle(new DirectorSchool($this->request));
        }
    }
}

class DirectorSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() > 3000 && $this->request->getPrice() <= 4500) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是主任' . PHP_EOL;
        } else {
            $this->requestHandle(new VicePrincipalSchool($this->request));
        }
    }
}

class VicePrincipalSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() > 4500 && $this->request->getPrice() <= 10000) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是副校长' . PHP_EOL;
        } else {
            $this->requestHandle(new PrincipalSchool($this->request));
        }
    }
}

class PrincipalSchool extends RequestHandleAbstract
{
    public function processHandle()
    {
        // TODO: Implement processHandle() method.
        // TODO: Implement processHandle() method.
        if ($this->request->getPrice() > 10000 && $this->request->getPrice() <= 50000) {
            echo '此次请求的任务是： '.$this->request->getDesc() . ' 请求的id是：' . $this->request->getId() . ' 请求的类型是：'
                . $this->request->getType() . ' 此次批复的金额为：' . $this->request->getPrice(). PHP_EOL;
            echo '处理人是校长' . PHP_EOL;
        } else {
            echo '超出职责范围处理不了' . PHP_EOL;
        }
    }
}
```

8. 测试，我们使用随机的需要采购物品的价格，来测试，看看不同的价格，最后是不是按照我们的想法得到处理的

```php
class Client
{
    public function __construct()
    {
        $request = new Request(mt_rand(1111, 9999), mt_rand(1, 99999), mt_rand(1, 9), '学校装修新电子教室');

        $clerk = new ClerkSchool($request);

        $clerk->processHandle();
    }
}

require '../vendor/autoload.php';
new Client();
```