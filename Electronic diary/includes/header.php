<? require 'includes/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<title>Мой блог</title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
		<? if ( $_SESSION['admin'] ) { ?>
			<div id="left">
				<a class="left" href="#">Админ Панель</a>
				<div class="hide">
					<a href="/admin.php?fnc=add_art">Добавить статью</a>
					<a href="/admin.php?fnc=re_art">Редактировать статью</a>
				</div>
			</div>
		<?}?>
			<div id="right">
				<? if ( !$_SESSION['id'] ) {?>
					<a href="/user.php?page=auth">Войти</a>
					<a href="/user.php?page=register">Регистрация</a>
				<?}else if ( $_SESSION['id'] ) {?>
					<a href="/user.php?page=logout">Выход</a>
					<a href="/user.php?page=profile">Профиль</a>
				<?}?>
					<a href="#">Обо мне</a>
					<a href="#">Новости</a>
			</div>
		<div class="clear"></div>
		</div>
		<div id="content">
			<div class="block">
