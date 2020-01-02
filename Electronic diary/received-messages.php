<?php
session_start();
require 'vendor/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Полученные сообщения</title>
	<style type="text/css">
		*{
			margin: 0 auto;
			padding: 0;
		}
		body{
			background-color: #e3e3e3;
		}
		.divaha{
	float: right;
	display: block;
	margin-top: -1%;
}
a{
	color: #7c9ab7;
	font-weight: bold;
	text-decoration: none;
}



	</style>
</head>
<body>
	<h2><?=$_SESSION['user']['full_name']?></h2>
	<div class = "divaha">
	<a href="profile.php"><?=$_SESSION['user']['email']?></a>
	<a href="articles.php">Новости</a>
	<a href="marks.php">Мои оценки</a>
	<a href="received-messages.php">Полученные сообщения</a>
	<a href="logout.php">Выход.</a>
</div><br><br>
<h2><center>Ваши полученные сообщения</center></h2>







<center><footer><a href="/sandmess.php">Я хочу отправить сообщение</footer></a></footer></center>
</body>
</html>