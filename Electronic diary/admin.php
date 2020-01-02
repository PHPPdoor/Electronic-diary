<?php
session_start();
require 'vendor/connect.php';
if ($_SESSION['user']['email'] != $adm_email1 and $_SESSION['user']['email'] != $adm_email) {
	echo "друг, шаришь что стр не существует? Ты хотел попасть в админку, но ничего у тебя не получится, хотя по адресу ты был близок!";
}elseif ($_SESSION['user']['email'] == $adm_email or $_SESSION['user']['email'] == $adm_email1) {


if(isset($_POST['delete'])){
	mysqli_query($connect, "DELETE  FROM `users` WHERE `users`.`id` = " . $_POST['id']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

</head>
<body>
<?php if($_SESSION['user']['email'] == $adm_email1 or $_SESSION['user']['email'] == $adm_email) :?>
<h4><a href="admin.php?fnc=add_art">Добавить статью</a></h4><br>
<h4><a href="admin.php?fnc=re_art&id=">Редактировать статью</a></h4>
<h4><a href="admin.php?fnc=del_comment&id=">Редактировать комментарий</a></h4>
<h4><a href="admin.php?fnc=gotomark">Выставить оценки</a></h4>
<h4><a href="admin.php?fnc=redact_mark">Редактировать оценки определенного ученика</a></h4>
<h4><a href="admin.php?fnc=see_mark">Посмотреть оценки определенного ученика</a></h4>
<h4><a href="/register.php">Зарегистрировать ученика</a></h4>
<h4><a></a>
<div class="form">
	<h1>Удалить человека по id!</h1>
	<form action="admin.php" method="post">
	<input type="text" name="id" placeholder="Введите ID">
	<input type="submit" name="delete" value="Удалить!">
	</form>
<?php else: ?>
	<div class="message">
		Такой страницы не существует!
	</div>
<?php endif; ?>

<?
	//if ( !$_SESSION['admin'] ) header('location: /');
	if ( $_GET['fnc'] == 'add_art' ) {?>
	<h1>Добавление статьи</h1>
		<form action="admin.php?fnc=add_art" method="post">
<?
	if ( $_POST['add_art'] ) {
		$author = $_POST['author'];
		$title = $_POST['title'];
		$text = $_POST['text'];
		mysqli_query($connect, "INSERT INTO `articles` (`author`, `title`, `text`, `date`) VALUES ('$_POST[author]', '$_POST[title]', '$_POST[text]', NOW())");
		echo "<span style='Color:green;'>Все хорошо ты супер крутой админ)</span>";
	//	header('location: /');
	}
?>
			<p><input type="text" class="input" name="author" placeholder="Автор" value="<?=$_SESSION['login']?>"></p>
			<p><input type="text" class="input" name="title" placeholder="Заголовок"></p>
			<p><textarea name="text" style="max-width: 100%;font-size: 18px;" cols="30" rows="10" placeholder="Текст статьи"></textarea></p>
			<p><input type="submit" name="add_art" class="button"></input></p>
		</form>
	<?}
	else if ( $_GET['fnc'] == 're_art' AND !$_GET['id'] ) {
		$query = mysqli_query($connect, "SELECT * FROM `articles` ORDER BY `id` DESC");
		$row = mysqli_num_rows($query);
		if ( !$row ) {echo 'статьей не найдено';
		}else {
			while ( $art = mysqli_fetch_assoc($query) ) {?>
				<hr><article>
					<p>Автор: <?=$art['author']?></p>
					<span style="float: right;"><a style="color: #000;border-bottom: 1px solid #000;" href="/admin.php?fnc=re_art&id=<?=$art['id']?>">Редактировать</a></span>
					<p>Заголовок: <?=$art['title']?></p>
					<p>Текст: <?=$art['text']?></p>
					<p>Дата опубликования: <?=$art['date']?></p>
				</article>
			<?}
		}
	}
	
	else if ( $_GET['fnc'] == 're_art' && $_GET['id'] ) {?>
	<h1>Редактирование статьи</h1>
		<form action="/admin.php?fnc=re_art&id=<?=$_GET['id']?>" method="post">
		
<?php $query_art = mysqli_query($connect, "SELECT * FROM `articles` WHERE `id` = " . $_GET['id']);
	@$art = mysqli_fetch_assoc($query_art);

	if ( $_POST['re_art'] ) {
		if ( $_POST['remove_art'] ) {
 			mysqli_query($connect, "DELETE FROM `articles` WHERE `id` = " . $_GET['id']);
		}else {
mysqli_query($connect, "UPDATE  `articles` SET  `author` = '" . $_POST['author']. "',`title` = '" . $_POST['title']. "', `text` = '" . $_POST['text'] . "' WHERE `id` = " . $art['id']);
echo "<span style='Color:green;'>Все хорошо ты супер крутой админ)</span>";
		}//header('location: /');
	}
?>
			<?php
			if($_SESSION['user']['email'] == $adm_email or $_SESSION['user']['email'] == $adm_email1){?>
			?>
			<p><input type="text" class="input" name="author" placeholder="Автор" value="<?=$art['author']?>"></p>
			<p><input type="text" class="input" value="<?=$art['title']?>" name="title" placeholder="Заголовок"></p>
			<p><textarea name="text" style="max-width: 100%;font-size: 18px;" cols="30" rows="10" placeholder="Текст статьи">
				<?=$art['text']?>
			</textarea></p>
			<p><input type="submit" name="re_art" class="button"></input>
			<span><input name="remove_art" value="remove" type="checkbox">Удалить статью</span></p>
		</form><?}?>
	<?}elseif ( $_GET['fnc'] == 'del_comment' && !$_GET['id'] ) {
		$query = mysqli_query($connect, "SELECT * FROM `comments` ORDER BY `id` DESC");
		$rows = mysqli_num_rows($query);
		if ( !$rows ) {echo 'Комментариев пока что нет!';
		}else {
			while ( $art = mysqli_fetch_assoc($query) ) {?>
				<hr><article>
					<p>Автор: <?=$art['name']?></p>
					<span style="float: right;"><a style="color: #000;border-bottom: 1px solid #000;" href="/admin.php?fnc=del_comment&id=<?=$art['id']?>">Редактировать</a></span>
					<p>Текст: <?=$art['text_comment']?></p>
				</article>
			<?}
		}
	}
	else if ( $_GET['fnc'] == 'del_comment' && $_GET['id'] ) {?>
	<h1>Редактирование комментария</h1>
		<form action="admin.php?fnc=del_comment&id=<?=$_GET['id']?>" method="post">
			<input type="text" name="name" value="Имя автора" ><br><br>
			<textarea type="text" name="text_comment">Текст комментария</textarea><br><br>
			<input type="submit" name="">
			<input name="remove_com" value="remove" type="checkbox">Удалить статью</span>
<?php if ( $_GET['fnc'] == 'del_comment' ) {

	 mysqli_query($connect, "UPDATE  `comments` SET  `name` = '" . $_POST['name'] . "', `text_comment` = '" . $_POST['text_comment'] . "' WHERE `id` = " .  $_GET['id']);
		$ok = "<span style='Color:green;'>Все ок, осталось только только отправить.</span>";
		echo $ok;
		unset($ok);
		}
}
if ($_POST['remove_com']) {
	mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = " . $_GET['id']);
}

if ( $_GET['fnc'] == 'gotomark' ) {?>
	<center><h2>Помните кто сделал этот сайт. Помните о справедливости!</h2><center>
	<form method="POST" action="admin.php?fnc=gotomark">
		<div class="table">
			ФИО: <input type="text" name="fio"><br><br>
			Алгебра: <input type="text" name="algebra"><br><br>
			Геометрия: <input type="text" name="geometry"><br><br>
			Информатика: <input type="text" name="informatic"><br><br>
			Физика: <input type="text" name="physic"><br><br>
			География: <input type="text" name="geography"><br><br>
			Экономика: <input type="text" name="ekonomic"><br><br>
			УГДД: <input type="text" name="ygdd"><br><br>
			Русский язык: <input type="text" name="russian"><br><br>
			Литература: <input type="text" name="literature"><br><br>
			Химия: <input type="text" name="chemistry"><br><br>
			Биология: <input type="text" name="biology"><br><br>
			Физическая культура: <input type="text" name="phis"><br><br>
			Компьютерная графика: <input type="text" name="kg"><br><br>
			НВП: <input type="text" name="nvp"><br><br>
			МСП: <input type="text" name="msp"><br><br>
			Укр. яз. и лит.: <input type="text" name="yliterature"><br><br>
			<input type="submit" name="">
		</div>
	</form>
		<?
		$fio = $_POST['fio'];
$algebra = $_POST['algebra'];
$geometry = $_POST['geometry'];
$informatic = $_POST['informatic'];
$physic = $_POST['physic'];
$geography = $_POST['geography'];
$ekonomic = $_POST['ekonomic'];
$ygdd = $_POST['ygdd'];
$russian = $_POST['russian'];
$literature = $_POST['literature'];
$chemistry = $_POST['chemistry'];
$biology = $_POST['biology'];
$phis = $_POST['phis'];
$kg = $_POST['kg'];
$nvp = $_POST['nvp'];
$msp = $_POST['msp'];
$yliterature = $_POST['yliterature'];
mysqli_query($connect, "INSERT INTO `marks` (`FIO`, `Alg`, `geometr`, `inform`, `physic`, `geography`, `econom`, `ugdd`, `russian`, `literature`, `chemistry`, `byology`, `fizra`, `kg`, `nvp`, `msp`, `ukr`) VALUES ('$_POST[fio]', '$_POST[algebra]', '$_POST[geometry]', $_POST[informatic]',  $_POST[physic]', $_POST[geography]', $_POST[ekonomic]', $_POST[ygdd]', $_POST[russian]', $_POST[literature]', $_POST[chemistry]', $_POST[biology]', $_POST[phis]', $_POST[kg]', $_POST[nvp]', $_POST[msp]', $_POST[yliterature]' NOW())");
}//Закрывает готомарк
?>
<?php
if ( $_GET['fnc'] == 'redact_mark' ) {?>
	<center><h1>Редактировать оценки</h1></center>
	<form method="POST" action="">
		<div class="table">
			ФИО: <input type="text" name="fio" placeholder="ВНИМАНИЕ: Имя должно быть точно, как в базе данных!"><br><br>
			Алгебра: <input type="text" name="algebra"><br><br>
			Геометрия: <input type="text" name="geometry"><br><br>
			Информатика: <input type="text" name="informatic"><br><br>
			Физика: <input type="text" name="physic"><br><br>
			География: <input type="text" name="geography"><br><br>
			Экономика: <input type="text" name="ekonomic"><br><br>
			УГДД: <input type="text" name="ygdd"><br><br>
			Русский язык: <input type="text" name="russian"><br><br>
			Литература: <input type="text" name="literature"><br><br>
			Химия: <input type="text" name="chemistry"><br><br>
			Биология: <input type="text" name="biology"><br><br>
			Физическая культура: <input type="text" name="phis"><br><br>
			Компьютерная графика: <input type="text" name="kg"><br><br>
			НВП: <input type="text" name="nvp"><br><br>
			МСП: <input type="text" name="msp"><br><br>
			Укр. яз. и лит.: <input type="text" name="yliterature"><br><br>
			<input type="submit" name="">
		</div>
	</form>
<?//код пхп после этого
}
$fio = $_POST['fio'];
$algebra = $_POST['algebra'];
$geometry = $_POST['geometry'];
$informatic = $_POST['informatic'];
$physic = $_POST['physic'];
$geography = $_POST['geography'];
$ekonomic = $_POST['ekonomic'];
$ygdd = $_POST['ygdd'];
$russian = $_POST['russian'];
$literature = $_POST['literature'];
$chemistry = $_POST['chemistry'];
$biology = $_POST['biology'];
$phis = $_POST['phis'];
$kg = $_POST['kg'];
$nvp = $_POST['nvp'];
$msp = $_POST['msp'];
$yliterature = $_POST['yliterature'];
mysqli_query($connect, "UPDATE  `marks` SET  `Alg` = '{$_POST['algebra']}',`geometr` = '{$_POST['geometry']}', `inform` = '{$_POST['informatic']}', `physic` = '{$_POST['physic']}', `geography` = '{$_POST['geography']}', `econom` = '{$_POST['ekonomic']}', `ugdd` = '{$_POST['ygdd']}' , `russian` = '{$_POST['russian']}', `literature` = '{$_POST['literature']}', `chemistry` = '{$_POST['chemistry']}', `byolog` = '{$_POST['biology']}', `fizra` = '{$_POST['phis']}', `kg` = '{$_POST['kg']}', `nvp` = '{$_POST['nvp']}', `msp` = '{$_POST['msp']}', `ukr` = '{$_POST['yliterature']}' WHERE `FIO` = '$fio'");
?>
	
</form>
<?}?>