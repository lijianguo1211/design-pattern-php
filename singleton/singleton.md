### PHP设计模式之单例模式

1. 单例模式在设计模式中是属于创建型的类型

2. 单例模式可以使一个程序处理请求过程中，只创建一次，减少类的频繁实例化

3. 单例模式不可以在外部实例化，也就是构造方法要设置为私有的方法

4. 单例模式只需要向外部提供一个公开的静态方法接口，给外部调用者使用

5. 单例模式要提供一个私有的克隆方法，防止外部克隆产生一个新的副本

6. 单例模式需要提供一个私有的防止类序列化的方法，以免产生一个新的副本

7. 单例模式可以分类饿汉式和饱汉式等等，在这里我们就提供一个饿汉式的单例模式

8. 单例模式一般可以用于数据层的连接（数据库的连接）

9. 可以把单例模式创建的类设置为 `final`,就是这是一个最终的类，不许继承，不许修改

10. 具体PHP实现单例模式如下：

```php
final class DbConnect
{
    private static $instance = null;

    /**
     * 防止外部实例化
     * DbConnect constructor.
     */
    private function __construct()
    {
        try {
            $dsn = 'mysql:dbname=test;host=127.0.0.1;port=3306';
            $username = 'root';
            $password = 'root';
            static::$instance = new \PDO($dsn, $username, $password);

        } catch (\PDOException $e) {
            die('PDO connect is error!' . $e->getMessage());
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

    }

    /**
     * Notes: 防止克隆产生一个副本
     * Name: __clone
     * User: LiYi
     * Date: 2020/6/14
     * Time: 12:04
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * Notes:防止序列化产生副本
     * Name: __wakeup
     * User: LiYi
     * Date: 2020/6/14
     * Time: 12:04
     */
    private function __wakeup()
    {

    }

    /**
     * Notes:对外提供的一个唯一的访问接口
     * Name: getInstance
     * User: LiYi
     * Date: 2020/6/14
     * Time: 12:05
     */
    public static function getInstance()
    {
        //单例模式有饿汉式和饱汉式之分
        //饿汉式就是实例化这个类的时候，先判断是否创建，没有创建才去实例化
        //饱汉式就是进来就先创建，然后返回
        //在PHP中，一般的运行环境都是LNPM,安装PHP的时候也是一般安装的是线程安全的版本，没有多线程，一般都是一个请求进来，就是一个进程，所
        //以同一个请求就是一个进程，对开发来说这个很简单，不需要去考虑线程安全与否，那么我们在创建的时候，就在这里使用饿汉式

        if (null === static::$instance) {
            new self();
        }

        return static::$instance;
    }
}
```

11. 测试代码如下：

```php
class Client
{
    public function __construct()
    {
        $test1 = DbConnect::getInstance();

        $sql = "SELECT user,host FROM mysql.user WHERE user = :user";
        $statement = $test1->prepare($sql);

        $username = 'root';
        $statement->bindParam(':user', $username);
        $statement->execute();
        $users = $statement->fetchAll();
        print_r($users);
        var_dump(($test1->query('SELECT user,host FROM mysql.user;'))->fetchAll());
    }
}
```