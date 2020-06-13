### PHP之观察者模式

* 观察者模式在PHP里面是有已经定义好的两个接口文件，我们只需要继承它并实现它，那么我们的观察者模式就已经算是实现了。

1. 首先观察者模式，顾名思义，就是需要有一个观察者和被观察者，被观察的对象发生了变化，可以及时通知所有观察这个对象变化的对象

2. 在PHP种预定义的观察者： ```\SplObserver```观察者定义了一个接口：

```php
interface SplObserver
{
    public function update(SplSubject $subject);
}
```

3. 在PHP种预定义的被观察者：```\SplSubject```,这个被观察者定义了三个接口方法

```php
interface SplSubject
{
    public function attach(SplObserver $observer);
    
    public function detach(SplObserver $observer);
    
    public function notfiy();


}
```

4. 很明显，在观察者方法里，如果有变化了就调用`update()`方法; 在被观察里，第一个方法`attach()`,添加一个被观察者到一个自己维护的数据结构中，
这个结构可以是PHP的数组`array`, 可以是一个集合，可以是一个`has`表，具体的怎么实现，都可以自己操作。`detach()`这个方法就是从之维护的一个结
构中，删掉这个被观察者。最后一个核心的方法就是`notfiy`,它是从之前的数据存储结构中，遍历所有的观察者，调用观察者里的方法，通知它需要做事情了。

5. 之前第四步说的存储注册观察者的数据结构，可以是一个数组，可以是一个集合，同时还可以是PHP自己实现的一个`\SplObjectStorage`的一个管理类
[SplObjectStorage](https://php.net/manual/en/class.splobjectstorage.php) 在里面它实现了很多方法,包括但不限于`attach(), detach()`
是一个很强大的类，可以帮我们做这些事情。如下：

```php
class SplObjectStorage implements \Countable, \Iterator, \Serializable, \ArrayAccess {
        
    public function attach ($object, $data = null) {}
    public function detach ($object) {}
    public function contains ($object) {}
    public function addAll ($storage) {}
    public function removeAll ($storage) {}
    public function removeAllExcept ($storage) {}
    public function getInfo () {}
    public function setInfo ($data) {}

    /**
     * @inheritDoc
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        // TODO: Implement count() method.
    }
}
```

6. 使用一个观者者模式解决我们业务上的一个逻辑，如下：纯属虚构。
假如现在有一个天气预报的平台，它是一个权威的检测和发布天气的平台，它得到最新的天气后，会把最新的天气情况转送给给大媒体平台，这样我们不管在那个
媒体平台都可以看到最新的天气情况，假设现在有新浪天气，百度天气，腾讯天气，墨迹天气。。。假设是有这四家来得到天气的变化情况，然后免费更新。那么
现在这个权威的天气检测平台就是一个被观察者，而那四家媒体平台就是观察者。

7. 现在创建一个被观察者媒体平台

```php
class Weather implements \SplSubject
{

    /**
    *  管理所有观察者
    * @var SplObjectStorage 
     */
    private $observers;
    
    // 最新的天气情况
    private $email;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritDoc 注册观察者
     */
    public function attach(SplObserver $observer)
    {
        // TODO: Implement attach() method.
        $this->observers->attach($observer);
    }

    /**
     * @inheritDoc 注销观察者
     */
    public function detach(SplObserver $observer)
    {
        // TODO: Implement detach() method.
        $this->observers->detach($observer);
    }

    // 天气改变后，通知所有的观察者
    public function changeWeather(string $email)
    {
        $this->setEmail($email)->notify();
    }

    /**
     * @inheritDoc 通知所有的观察者
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->observers as $observer) {
            $observer->update($this);//调用观察的update方法
        }
    }
}
```

8. 创建四个观察者

```php
class Baidu implements \SplObserver
{

    /**
     * @inheritDoc
     */
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo '给百度发邮件了， 天气变化：' . $subject->getEmail() . PHP_EOL;
    }
}

class Tencent implements \SplObserver
{

    /**
     * @inheritDoc
     */
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo '给腾讯发邮件了， 天气变化：' . $subject->getEmail() . PHP_EOL;
    }
}

class MoJi implements \SplObserver
{

    /**
     * @inheritDoc
     */
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo '给墨迹发邮件了， 天气变化：' . $subject->getEmail() . PHP_EOL;
    }
}

class Sina implements \SplObserver
{

    /**
     * @inheritDoc
     */
    public function update(SplSubject $subject)
    {
        // TODO: Implement update() method.
        echo '给新浪发邮件了， 天气变化：' . $subject->getEmail() . PHP_EOL;
    }
}
```

8. 客户端测试调用

```php
class Client
{
    public function __construct(string $email)
    {
        $weather = new Weather();
        $baidu = new Baidu();
        $sina = new Sina();
        $moji = new MoJi();
        $tencent = new Tencent();

        $weather->attach($baidu);
        $weather->attach($sina);
        $weather->attach($moji);
        $weather->attach($tencent);
        $weather->changeWeather($email);
    }
}

new Client('今天的天气温度是 36.6摄氏度，注意高温防晒');
new Client('今天的天气温度是 40.0摄氏度，注意高温防晒');
new Client('今天的天气温度是 22.0摄氏度，温度刚刚好');
```

9. 当我们天气变化的时候，就直接调用`changeWeather()`方法，这样四家媒体平台就都得到最新的天气情况了