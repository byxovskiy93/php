<?php

define('SITE_DIR', __DIR__ . '/../');
define('CONFIG_DIR', SITE_DIR . 'config/');
define('DATA_DIR', SITE_DIR . 'data/');
define('ENGINE_DIR', SITE_DIR . 'engine/');
define('WWW_DIR', SITE_DIR . 'public/');
define('TEMPLATES_DIR', SITE_DIR . 'templates/');

define('IMG_DIR', 'img/');


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'geek_brains_php');


require_once ENGINE_DIR . 'functions.php';
require_once ENGINE_DIR . 'db.php';
require_once ENGINE_DIR . 'gallery.php';
require_once ENGINE_DIR . 'news.php';

