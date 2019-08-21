<?php

require_once __DIR__ . '/../config/config.php';

if(is_auth() and getRole() != 1){
    header('Location: /login.php');
    die;
}

$allOrder = getAllOrders();

echo render(TEMPLATES_DIR . 'adminOrder.tpl', [
    'title' => 'Админ панель',
    'h1' => 'Заказы',
    'content' => ($allOrder) ? renderAdminClientOrder($allOrder) : render(TEMPLATES_DIR.'orderEmpty.tpl'),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);
