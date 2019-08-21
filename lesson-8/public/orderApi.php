<?php

require_once '../config/config.php';

$id = $_POST['id'] ?? false;
$method = $_POST['method'] ?? false;

if(!$method) {
    echo 'метод не передан';
    exit();
}

if(!$id) {
    echo 'id не передан';
    exit();
}

$result = false;

switch ($method){
    case 'remove':
        if(removeOrderClient($id)){
            $response = "<div class='alert alert-success' role='alert'>
             Заказ № $id успешно отменен!</div>";
            $result = success($response);
        }else{
            $result = error($id);
        };
        break;
    case 'switch':
        $status = $_POST['status'] ?? false;
        if(!$status) {
            echo 'статус не передан';
            exit();
        }
        $response = switchOrderStatus($id,$status);
        $result = success($response);
        break;
}

header('Content-Type: application/json');


function error($error_text)
{
    return json_encode([
        'error' => true,
        'error_text' => $error_text,
        'data' => null
    ]);
}

//Функция успешного ответа
function success($data = true)
{
    return json_encode([
        'error' => false,
        'error_text' => null,
        'data' => $data
    ]);
}

echo $result;