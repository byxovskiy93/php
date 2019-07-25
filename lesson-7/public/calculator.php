<?php

require_once __DIR__ . '/../config/config.php';

//var_dump($_POST);

$result = '';

if(isset($_POST['argument_one']) and isset($_POST['argument_two']) and isset($_POST['operation'])){
    $result = calculate($_POST['argument_one'],$_POST['argument_two'],$_POST['operation']);
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Калькулятор',
    'h1' => 'Калькулятор',
    'content' => render(TEMPLATES_DIR . 'calculate.tpl',['result' => $result])
]);
