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
$teacher->subject('一', '语文');

$teacher->subject('二', '数学');
$teacher->subject('三', '体育');
$teacher->subject('四', '英文');