<?
require "vendor/connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Статья</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Open+Sans+Condensed:300|Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Open+Sans+Condensed:300|Pacifico|Shadows+Into+Light&display=swap" rel="stylesheet">

	<style type="text/css">
		body{
			background-color: #e3e3e3;
		}
		a{
			color: #7c9ab7;
			font-weight: bold;
			text-decoration: none;
		}
		.diva{
			float: right;
			display: block;
			margin-top: -2%;
		}
		.auvtor{
			font-family: 'Dancing Script', cursive;
		}
		.textion{
			font-family: 'Open Sans Condensed', sans-serif;
			font-size: 140%;
		}
	</style>
	</head>
<body>
	<h2 style="color: #be78ff; font-family: 'Anton', sans-serif;
" ><?=$_SESSION['user']['full_name']?></h2>
	<div>
		<div style="font-family: 'Pacifico', cursive;
" class="diva">
	<a href="#"><?=$_SESSION['user']['email']?></a>
	<a href="articles.php">Новости</a>
	<a href="marks.php">Мои оценки</a>
	<a href="logout.php">Выход.</a>
</div>
	<h1 style="font-family: 'Shadows Into Light', cursive;
"><center>Новости</center></h1>
	<h1><hr></h1>
	<?
	$query = mysqli_query($connect, "SELECT * FROM `articles` ORDER BY `id` DESC");
		$row = mysqli_num_rows($query);
		if (!$row) {echo 'статьей не найдено';
		}else {
			while ($art = mysqli_fetch_assoc($query)) {?>
				<article>
					<p class="auvtor">Автор: <?=$art['author']?></p>
					<?php
					if ($_GET['user']['email'] == $adm_email) {?>
					<span style="float: right;"><a style="color: #000;border-bottom: 1px solid #000;" href="/admin.php?fnc=re_art&id=<?=$art['id']?>">Редактировать<br></a></span>
				<?php 
			}
			?>
					
					<? 
					echo '<a href=news-and-comment.php?id='.$art['id'].'>'.$art['title'].'</a><br>';
					?>
					<p class="textion">Текст: <?=$art['text']?></p>
					<p>Дата опубликования: <?=$art['date']?></p>
				</article>
				<h1><hr></h1>
			<?}
		}
	?>
</body>
</html>