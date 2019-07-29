<?php

require_once '../../config/config.php';

$id = $_GET['id'] ?? false;

if(!$id) {
    echo 'id не передан';
    exit();
}

$productItem = false;
$productItem = getOneProduct($id);

if(!$productItem) {
    $productItem = [
        'title' => '404',
        'content' => 'Товар не найден!'
    ];
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => $productItem['name'],
    'h1' => $productItem['name'],
    'content' => renderOneProduct($productItem),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);