<?php
require_once __DIR__ . '/../config/config.php';

if(!empty($_POST['address'])){
 $address = $_POST['address'];
 createOrder($address);
}else{

    if(!empty($_GET['status']) && $_GET['status'] == 'success'){
        echo render(TEMPLATES_DIR . 'index.tpl', [
            'title' => 'Оформление заказа!',
            'h1' => 'Оформление заказа!',
            'content' => render(TEMPLATES_DIR . 'orderSuccess.tpl'),
            'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
        ]);
    }elseif(!empty($_GET['status']) && $_GET['status'] == 'error'){
        echo render(TEMPLATES_DIR . 'index.tpl', [
            'title' => 'Оформление заказа!',
            'h1' => 'Оформление заказа!',
            'content' => render(TEMPLATES_DIR . 'orderError.tpl'),
            'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
        ]);
    }else{
        echo render(TEMPLATES_DIR . 'index.tpl', [
            'title' => 'Оформление заказа!',
            'h1' => 'Оформление заказа!',
            'content' => renderOrder(),
            'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
        ]);
    }

}
