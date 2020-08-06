### 外观模式

* 外观类 为调用端提供统一的调用接口，外观类知到那些子系统负责处理请求，从而将调用端的请求代理给适当的子系统

1. 外观模式对外屏蔽了子系统的细节，因此外观模式降低了客户端对子系统的使用的复杂性

2. 外观模式对客户端与子系统的耦合关系，让子系统内部的模块更容易维护和扩展

3. 通过合理的使用外观模式，可以更好的划分访问的层次

> 生活举例，比如有一个影院系统，影院里有DVD，投影仪，爆米花机，幕布，音响，灯光，总共有这么多设备，我们去电影院开电影呢，用户是不关心影院怎么
工作的，用户只关心的电影开始，暂停，继续播放，结束，他们关心的只有这四个阶段，至于电影院怎么打开灯光，拉下幕布，打开投影仪，调试音响，打开DVD
这些工作，用户都不需要知道，他们使用的时候，只需要知道上面说的四个阶段就好了，这样就降低了对用户来说这个系统的复杂度，而且对维护者来说也是更加
的利于维护，那个阶段出了问题，分四步走，哪一个步骤有问题，一目了然。而这里，刚好就可以使用外观模式来尝试一下做这个事情。

具体的实现:
1. 创建一个DVD类,dvd可以打开，暂停，继续播放，结束关闭

```php
class DvdPlayer
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    public function on()
    {
        var_dump("打开 DVD");
    }

    public function off()
    {
        var_dump("关闭DVD");
    }

    public function play()
    {
        var_dump("开始播播放DVD");
    }

    public function suspend()
    {
        var_dump("暂停播放DVD");
    }
}
```

2. 灯光类，打开灯，关闭灯

```php
class TheaterLight
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }
    
    public function on()
    {
        var_dump("打开灯光");
    }
    
    public function off()
    {
        var_dump("关闭灯光");
    }
}
```

3. 音响类，打开音响，关闭音响，加大声音，减小声音

```php
class Stereo
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    public function on()
    {
        var_dump("打开音响");
    }

    public function off()
    {
        var_dump("关闭音响");
    }

    public function volumeUp()
    {
       var_dump("加大音量"); 
    }

    public function volumeDown()
    {
        var_dump("减小音量");
    }
}
```

4. 娱乐爆米花类，打开爆米花机，制作爆米花，关闭爆米花机

```php
class Popcorn
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }
    
    public function on()
    {
        var_dump("打开爆米花机");
    }
    
    public function up()
    {
        var_dump("关闭爆米花机");
    }

    public function make()
    {
        var_dump("制作爆米花");
    }
}
```

5. 投影仪类，打开投影仪，关闭投影仪

```php
class Projector
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }
    
    public function on()
    {
        var_dump("打开投影仪");
    }
    
    public function off()
    {
        var_dump("关闭投影仪"); 
    }
}
```

6. 幕布类，放下幕布，升起幕布

```php
class Screen
{
    public static $instance = null;

    public static function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }
    
    public function down()
    {
        var_dump("放下幕布");
    }
    
    public function up()
    {
        var_dump("升起幕布");
    }
}
```

7. 影院的外观类,电影开始，暂停，继续播放，结束，在这里，把所有的子系统全部集中到影院的外观类里，使用私有的属性保存各个子系统，为了简单起见，
没有使用依赖注入，而是使用单例模式来获取各个子系统。

```php
class HomeFacade
{
    private $dvd;

    private $theaterLight;

    private $popcorn;

    private $stereo;

    private $projector;

    private $screen;

    public function __construct()
    {
        $this->dvd = DvdPlayer::getInstance();

        $this->theaterLight = TheaterLight::getInstance();

        $this->popcorn = Popcorn::getInstance();

        $this->stereo = Stereo::getInstance();

        $this->projector = Projector::getInstance();

        $this->screen = Screen::getInstance();
    }

    public function ready()
    {
        //打开
        echo "#################" . PHP_EOL;
        $this->theaterLight->on();//灯
        $this->popcorn->on();//爆米花
        $this->popcorn->make();
        $this->screen->down();//幕布
        $this->projector->on();//投影仪
        $this->stereo->on();//音响
        $this->dvd->on();//dvd
    }

    public function play()
    {
        echo "#################" . PHP_EOL;
        $this->theaterLight->off();
        $this->dvd->play();
        $this->stereo->volumeUp();
        //播放
    }

    public function pause()
    {
        echo "#################" . PHP_EOL;
       //暂停
        $this->dvd->suspend();
    }

    public function end()
    {
        echo "#################" . PHP_EOL;
        //结束
        $this->theaterLight->on();
        $this->stereo->volumeDown();
        $this->dvd->off();
        $this->stereo->off();
        $this->projector->off();
        $this->screen->up();
        $this->popcorn->off();
        $this->theaterLight->off();
    }

}
```

8. 最后客户端的调用

```php
class Client
{
    public function __construct(HomeFacade $facade)
    {
        $facade->ready();

        $facade->play();

        $facade->pause();

        $facade->end();
    }
}
```

9. 完整输出：

```
#################
string(12) "打开灯光"
string(18) "打开爆米花机"
string(15) "制作爆米花"
string(12) "放下幕布"
string(15) "打开投影仪"
string(12) "打开音响"
string(10) "打开 DVD"
#################
string(12) "关闭灯光"
string(18) "开始播播放DVD"
string(12) "加大音量"
#################
string(15) "暂停播放DVD"
#################
string(12) "打开灯光"
string(12) "减小音量"
string(9) "关闭DVD"
string(12) "关闭音响"
string(15) "关闭投影仪"
string(12) "升起幕布"
string(18) "关闭爆米花机"
string(12) "关闭灯光"
```
