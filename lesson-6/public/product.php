<?php

require_once __DIR__ . '/../config/config.php';

$products = getAllProducts();

echo render(TEMPLATES_DIR . 'product.tpl', [
    'title' => 'Товары',
    'h1' => 'Товары',
    'content' => renderAllProducts($products)
]);