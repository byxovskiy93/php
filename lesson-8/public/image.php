<?php

require_once __DIR__ . '/../config/config.php';

// $id = isset($_GET['id']) ? $_GET['id'] : false;
$id = $_GET['id'] ?? false;

if(!$id) {
	echo 'id не передан';
	exit();
}

echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Geek Brains Site',
	'h1' => "Картинка $id",
	'content' => showImage($id),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);
