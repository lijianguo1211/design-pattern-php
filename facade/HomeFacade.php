<?php

namespace Facade;

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