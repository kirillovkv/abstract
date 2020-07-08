<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
function __autoload($class) {
    $class = implode('/',explode('\\', $class));
    if(is_file($class . '.php')){
        include $class . '.php';
    }else{
        throw new Exception("Данный класс не найден {$class}");
    }
}

$form = new \Forms\TestForm();
$form->addField('name', 'nickname');
$form->addField('email', 'email');
$form->addField('numeric', 'phonenumber');
$form->email->addValidateRule(['validator'=>'notEmpty']);

$form->nickname = "Kirill";
$form->email = "kirillov_k.v@mail.ru";
$form->phonenumber = "89179999999";
$form->submit();
?>