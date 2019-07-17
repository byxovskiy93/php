<?php
require_once __DIR__ . '/../config/config.php';

$id = $_GET['id'] ?? false;

if(!$id) {
    echo 'id не передан';
    exit();
}

// проверяем ушел запрос или нет
$addView = addView($id);

$galleryItem = false;

if($addView){
    $sql = "SELECT * FROM images WHERE id = $id";
    $galleryItem = show($sql);
}

if(!$galleryItem) {
    $galleryItem = [
        'title' => '404',
        'content' => 'Картинка не найдена'
    ];
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => $galleryItem['title'],
    'h1' => $galleryItem['title'],
    'content' => renderOneImages($galleryItem)
]);