<?php
require_once __DIR__ . '/../config/config.php';

if(is_auth() and getRole() != 2){
    header('Location: /login.php');
    die;
}

$myOrder = getClientOrders();

echo render(TEMPLATES_DIR . 'clientOrder.tpl', [
    'title' => 'Личный кабинет',
    'h1' => 'Мой заказы',
    'content' => ($myOrder) ? renderClientOrder($myOrder) : render(TEMPLATES_DIR.'orderEmpty.tpl'),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);
