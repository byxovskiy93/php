<?php

require_once __DIR__ . '/../config/config.php';

$products = getAllProduct();

echo render(TEMPLATES_DIR . 'product.tpl', [
    'title' => 'Товары',
    'h1' => 'Товары',
    'content' => renderAllProduct($products)
]);