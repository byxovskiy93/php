<?php

require_once __DIR__ . '/../config/config.php';




echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Geek Brains Site',
	'h1' => 'Галерея',
	'content' => createGallery(),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);
