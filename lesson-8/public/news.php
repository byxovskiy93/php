<?php

require_once __DIR__ . '/../config/config.php';


$news = getNews();
$newsContent = renderNews($news);


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Новости',
	'h1' => 'Горячие новости',
	'content' => $newsContent,
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);
