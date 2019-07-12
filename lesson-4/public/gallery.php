<?php

require_once __DIR__ . '/../config/config.php';

$gallery = makeGallery(WWW_DIR . IMG_DIR);


echo render(TEMPLATES_DIR . 'index.tpl', [
	'title' => 'Галерея',
	'h1' => 'Галерея',
	'content' => render(TEMPLATES_DIR . 'gallery.tpl',[ 'Gallery' => $gallery])
]);
