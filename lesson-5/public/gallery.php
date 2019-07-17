<?php

require_once __DIR__ . '/../config/config.php';

$gallery = getAllImages();

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Главная',
    'h1' => 'Галерея',
    'content' => renderAllGallery($gallery)
]);
