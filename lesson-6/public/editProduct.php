<?php
require_once __DIR__ . '/../config/config.php';

$id = $_GET['id'] ?? false;

if(!$id) {
    echo 'id не передан';
    exit();
}

$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$description = $_POST['description'] ?? '';
$images = (!empty($_FILES['images']['name'])) ? $_FILES['images'] : $_POST['old_images'];

if ($name && $price && $description && $images) {
    if (editProduct($id,$name,$price,$description,$images)) {
        $messages .= '<div class="alert alert-success" role="alert">Товар обновлен.</div>';
        $name = '';
        $price = '';
        $description = '';
        $images = '';
    } else {
        $messages .= '<div class="alert alert-danger" role="alert">Что-то пошло не так!</div>';
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$name) {
        $messages .= '<div class="alert alert-danger" role="alert">Введите имя.</div>';
    }
    if (!$price) {
        $messages .= '<div class="alert alert-danger" role="alert">укажите цену.</div>';
    }
    if (!$description) {
        $messages .= '<div class="alert alert-danger" role="alert">Добавьте описание.</div>';
    }
}




$productItem = false;

$productItem = getOneProduct($id);
$productItem['messages'] = $messages;

if(!$productItem) {
    $productItem = [
        'title' => '404',
        'content' => 'Товар не найден!'
    ];
}



echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Редактировать продукт',
    'h1' => 'Редактировать продукт',
    'content' => renderEditProduct($productItem)
]);