<?php


require_once(__DIR__ . '/../config/config.php');

echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo "</pre>";


if ($_FILES) {
	$uploaddir = '/img/uploads/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	// if (move_uploaded_file($_FILES['userfile']['tmp_name'], WWW_DIR . $uploadfile)) {
	//     echo "Файл корректен и был успешно загружен.\n";
	//     echo "<a href='$uploadfile' target='_blank'>Посмотреть</a>";
	// } else {
	//     echo "Возможная атака с помощью файловой загрузки!\n";
	// }	
}

?>


<form enctype="multipart/form-data" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла (в байтах) -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="userfile" type="file" />
    <input type="submit" value="Send File" name="privet" />



	<select name="select">
		<option>+</option>
		<option>-</option>
	</select>
</form>


