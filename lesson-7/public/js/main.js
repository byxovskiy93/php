// $.post({
// 	url: '/action.php?id=1',
// 	data: {a: 1}
// });

//Функция AJAX авторизации

$('#login').submit(function (e) {
	e.preventDefault();
	login();
});


function login() {
	//Получаем input'ы логина и пароля
	const $login_input = $('[name="login"]');
	const $password_input = $('[name="password"]');

	//Получаем значение login и password
	const login = $login_input.val();
	const password = $password_input.val();


	//Инициализируем поле для сообщений
	const $message_field = $('.message');

	//Вызываем функцию jQuery AJAX с методом POST
	//Передаем туда url где будет обрабатваться API
	//И data которое будет помещена в $_POST
	//success - вызывается при успешном ответе от сервера
	$.post({
		url: '/api.php',
		data: {
			apiMethod: 'login',
			postData: {
				login: login,
				password: password
			}
		},
		success: function (data) {
			if(data.error) {
                $message_field.empty();
			 	$message_field.append('<div style="margin:15px 20px" class="alert alert-danger" role="alert">'+data.error_text+'</div>');
			 } else {
                $message_field.empty();
                document.location.href = "/cabinet.php";
			}
		}
	});
}
