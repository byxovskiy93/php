<?php

require_once '../../config/config.php';

$id = $_GET['id'] ?? false;

if (!$id) {
    echo '404';
    exit();
}

deleteProduct($id);

header("Location: index.php");