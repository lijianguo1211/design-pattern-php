<?php


namespace Bridge;


class Client
{
    public function __construct()
    {
        $phone1 = new FoldedPhone(new XiaoMiBrand());

        $phone1->call();

        $phone1->open();

        $phone1->close();
        printf("============================\n");
        $phone2 = new FoldedPhone(new HuaWeiBrand());

        $phone2->call();

        $phone2->open();

        $phone2->close();
        printf("============================\n");
        $phone3 = new UpRightPhone(new HuaWeiBrand());

        $phone3->open();

        $phone3->call();

        $phone3->close();
    }
}

require './../vendor/autoload.php';

new Client();