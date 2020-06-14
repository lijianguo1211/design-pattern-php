<?php

namespace Singleton;

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