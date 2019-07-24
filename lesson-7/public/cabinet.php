<?php
require_once __DIR__ . '/../config/config.php';

if(empty($_SESSION['login'])){
    header('Location: /login.php');
}

echo render(TEMPLATES_DIR . 'cabinet.tpl', [
    'title' => 'Личный кабинет',
    'h1' => 'Личный кабинет',
    'content' => render(TEMPLATES_DIR . 'cabinetInfo.tpl',$_SESSION['login'])
]);
