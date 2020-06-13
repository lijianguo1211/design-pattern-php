<?php


namespace Observer;


use SplSubject;

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