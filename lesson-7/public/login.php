<?php

require_once '../config/config.php';

if(!empty($_SESSION['login'])){
    header('Location: /cabinet.php');
}

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

//Если логин и пароль переданы попытаемся авторизоваться
if ($login && $password) {
	//преобразуем пароль в хэш
	$password = md5($password);
	//получаем пользователя из базы по логин-паролю
	$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
	$user = show($sql);

	//если пользователь найден. Записываем его в сессию
	if($user) {
		$_SESSION['login'] = $user;
	} else {
		echo 'Неверная пара логин-пароль';
	}
}


echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Вход',
    'h1' => 'Вход',
    'content' => render(TEMPLATES_DIR . 'login.tpl')
]);

?>



