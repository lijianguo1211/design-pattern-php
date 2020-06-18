<?php

namespace Test;

class TeacherTest
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

$teacher = new TeacherTest('王');
//$teacher->subject('一', '语文');
//
//$teacher->subject('二', '数学');
//$teacher->subject('三', '体育');
//$teacher->subject('四', '英文');

class TrafficTest
{
    public function run(string $name)
    {
        echo $name .  ' 在公路上行驶' . PHP_EOL;
    }

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

$traffic = new TrafficTest();
//汽车
$traffic->run('汽车');
//轮船
$traffic->run('轮船');
//飞机
$traffic->run('飞机');

interface BaseInterface
{
    public function index();

    public function show();

    public function edit();

    public function update();

    public function delete();
}

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