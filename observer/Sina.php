<?php


namespace Observer;


use SplSubject;

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