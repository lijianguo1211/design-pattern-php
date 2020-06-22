<?php

require '../vendor/autoload.php';

use Composite\Form;
//http://local.test.abc/
$form = new Form();

$form->text('username');

$form->password('password');

$form->email('email');
$form->number('number');
$form->file('file');
$form->hidden('hidden');

$style = <<<ERT
<style>
.form-group {
padding-bottom: 20px;
}
</style>
ERT;

echo $style;
var_export($form->render());




