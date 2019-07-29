<?php

require_once '../config/config.php';

if(is_auth() and getRole() == 2){
    header('Location: /cabinet.php');
    die;
}

if(is_auth() and getRole() == 1){
    header('Location: /adminCabinet.php');
    die;
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
    'content' => render(TEMPLATES_DIR . 'login.tpl'),
    'loginButton' => (is_auth()) ? '<a class="btn btn-outline-primary" href="/logout.php">Выход</a>' : '<a class="btn btn-outline-primary" href="/login.php">Вход</a>'
]);

?>



