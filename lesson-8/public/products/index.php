<?php

require_once '../../config/config.php';

$products = getAllProducts();

echo render(TEMPLATES_DIR . 'product.tpl', [
    'title' => 'Товары',
    'h1' => 'Товары',
    'content' => renderAllProducts($products),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);