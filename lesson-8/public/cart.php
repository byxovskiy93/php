<?php

require_once '../config/config.php';

$products = getCart();


if(is_auth() && $products){
    $button = '<a href="/order.php"  class="btn btn-lg btn-success text-uppercase">Далее</a>';
}elseif(is_auth() && !$products){
    $button = '<a href="/products/" class="btn btn-lg btn-success text-uppercase">Продукты</a>';
}
else{
    $button = '<a href="/login.php" class="btn btn-lg btn-success text-uppercase">Вход</a>';
}

echo render(TEMPLATES_DIR . 'cart.tpl', [
    'title' => 'Корзина',
    'h1' => 'Корзина',
    'totalsum' => getTotalSum(),
    'content' =>  renderCart($products),
    'buttonBuy' => $button,
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);