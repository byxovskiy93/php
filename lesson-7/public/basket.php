<?php

require_once '../config/config.php';

$id = $_GET['id'] ?? false;
$method = $_GET['method'] ?? false;

if(!$method) {
    echo 'метод не передан';
    exit();
}

$result = false;

switch ($method){
    case 'add':
        if(!$id) {
            echo 'id не передан';
            exit();
        }
        $result = addBasket($id);
        break;
    case 'delete':
        if(!$id) {
            echo 'id не передан';
            exit();
        }
        $result = deleteBasket($id);
        break;
    case 'total':
        $result = getTotalSum();
        break;
}

echo $result;


