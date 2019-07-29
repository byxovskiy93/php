<?php

require_once '../../config/config.php';

$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$description = $_POST['description'] ?? '';
$images = $_FILES['images'] ?? '';

if ($name && $price && $description && $images) {
    if (createProduct($name,$price,$description,$images)) {
        $messages .= '<div class="alert alert-success" role="alert">Товар добавлен.</div>';
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
    if (!$images) {
        $messages .= '<div class="alert alert-danger" role="alert">Выбирите файлы.</div>';
    }
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Добавить продукт',
    'h1' => 'Добавить продукт',
    'content' => renderAddProduct($messages),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);