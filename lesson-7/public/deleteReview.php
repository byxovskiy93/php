<?php

require_once __DIR__ . '/../config/config.php';

$id = $_GET['id'] ?? false;

if (!$id) {
	echo '404';
	exit();
}

deleteReview($id);

header("Location: /reviews.php");