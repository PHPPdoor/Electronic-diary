<?php
session_start();
$adm_email = 'mhlvvln@gmail.com';
$adm_email1 = 'mhlvvln@gmail.com';
if($_SESSION['user']['email'] != $adm_email or $_SESSION['user']['email'] != $adm_email1){
	header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация и регистрация</title>
	<meta charset="utf-8">
	<style>
		        *{
    margin:0;
    padding:0;
    box-sizing: border-box;
}

body{
    font-family: Montserrat, sans-serif;
    display: flex;
    align-items: center;
    height: 100vh;
    justify-content: center;
    background-color: #e3e3e3;
}

form{
    display: flex;
    flex-direction: column;
    width: 400px;
}
input{
    margin: 10px 0;
    padding: 10px;
    border: unset;
    border-bottom: 2px solid #e3e3e3;
    outline: none;

}

button{
    padding: 10px;
    background: #e3e3e3;
    border: unset;
    cursor: pointer;
}

a{
    color: #7c9ab7;
    font-weight: bold;
    text-decoration: none;
}

p{
    margin: 10px 0;
}

.message{
    border: 2px solid #7c9ab7;;
    border-radius: 3px;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}</style>
</head>

<body>

<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <h1>Зарегистрировать ученика<hr><br></h1>
	<label>ФИО</label>
	<input type="text" name="full_name" placeholder="Введите свое имя" required="">
	<label>Логин</label>
	<input type="text" name="login" placeholder="Введите желаемый логин" required="">
	<label>Изображение профиля</label>
	<input type="file" name="avatar">
	<label>Введите адрес своей почты</label>
	<input type="email" name="email" placeholder="Ваш E-Mail" required="">
	<label>Пароль</label>
	<input type="password" name="password" placeholder="Password" required="">
	<label>Подтвердите пароль</label>
	<input type="password" name="password_confirm" placeholder="Password" required="">
	<button type="submit">Зарегистрироваться!</button>
	<p>
	<!--	У вас уже есть аккаунт? - <a href = "/index.php">авторизируйтесь!</a>-->
	</p>
	
	<?php
	if($_SESSION['message']){
		echo '<p class="message">' . $_SESSION['message'] . '</p>';
	}
		 unset($_SESSION['message']);
?>


</form>
</body>
</html>