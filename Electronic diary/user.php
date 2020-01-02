<?php
session_start();
require 'vendor/connect.php';
//Сплошная верстка
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$_SESSION['user']['full_name']?></title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background-color: #e3e3e3;
		}
		.friends{
			border: 1px dashed #3840d1;
			width: 200px;
		}
		.avatar{
			margin-left: 15%;
			margin-top: 20%;
			float: left;
			
		}
		a{
			font-weight: bold;
			color: #7c9ab7;
			text-decoration: none;
			cursor: wait;
		}
		#name{
			display: inline-flex;
			margin-top: 15%;
			color: #6b6b6b;
			margin-left: 10%;
		}

	</style>
</head>
<body>
	<h2 id = "name"><?=$_SESSION['user']['full_name']?></h2>
<div class="avatar">
	<img src="<?=$_SESSION['user']['avatar']?>" width="200px" height="250px"/>
	<div class="friends">
	<a href = "#">Добавить в друзья<br></a>
	<a href = "#">Написать сообщение</a>	
	</div>
<?php
//if (!$_SESSION['user']['avatar']){?>

<!--<div class="photo">
	Загрузите фотографию
</div>
-->

</div>


</body>
</html>