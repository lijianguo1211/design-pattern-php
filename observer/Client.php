<?php


namespace Observer;


class Client
{
    public function __construct(string $email)
    {
        $weather = new Weather();
        $baidu = new Baidu();
        $sina = new Sina();
        $tencent = new Tencent();

        $weather->attach($baidu);
        $weather->attach($sina);
        $weather->attach($tencent);
        $weather->changeWeather($email);
    }
}

require '../vendor/autoload.php';

$test = new Client('今天的天气温度是 36.6摄氏度，注意高温防晒');
$test = new Client('今天的天气温度是 40.0摄氏度，注意高温防晒');

var_export(new \SplObjectStorage());