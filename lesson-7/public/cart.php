<?php

require_once '../config/config.php';

$products = getCart();


echo render(TEMPLATES_DIR . 'cart.tpl', [
    'title' => 'Корзина',
    'h1' => 'Корзина',
    'TOTALSUM' => getTotalSum(),
    'content' => renderCart($products)
]);