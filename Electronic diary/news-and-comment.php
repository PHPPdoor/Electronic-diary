<?php
session_start();
//error_reporting(0);
require "vendor/connect.php";
//$adm_email = 'mhlvvln@gmail.com';
//$adm_email1 = 'Mhlvvln@gmail.com';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Статья</title>
  <link href="https://fonts.googleapis.com/css?family=Anton|Dancing+Script|Ma+Shan+Zheng|Open+Sans+Condensed:300|Pacifico|Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href = "https://fonts.googleapis.com/css?family= Pacifico & display = swap" rel = "stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Crimson+Text|Dancing+Script|Ma+Shan+Zheng|Open+Sans+Condensed:300|Pacifico|Shadows+Into+Light&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
  body{
      background-color: #e3e3e3;
    }
    button{
  padding: 10px;
  background: #e3e3e3;
  border: unset;
  cursor: pointer;
}
textarea{
  margin: 10px 0;
  padding: 10px;
  border: unset;
  border-bottom: 2px solid #e3e3e3;
  outline: none;

}
.datatime{
	float: right;
	height: 20%;
	width: 10%;
}

  </style>

</head>
<body>

</body>
</html>
<?php

?>
<?$query = mysqli_query($connect, "SELECT * FROM `articles` WHERE `id` = '$_GET[id]'");
		$row = mysqli_num_rows($query);
		if (!$row){
			echo "Статьи уже нет";
		}else{
			while ($art = mysqli_fetch_assoc($query)) {?>
				<article>
					<center><h1><p><?=$art['title']?></p></h1></center>
					<div style="width: 75%;">
					<p style="font-family: 'Open Sans Condensed', sans-serif; font-size: 140%;">Текст: <?=$art['text']?></p>
					<p style="font-family: 'Ma Shan Zheng', cursive;
">Автор: <?=$art['author']?></p>
					<?php
					if ($_SESSION['user']['email'] == $adm_email or $_SESSION['user']['email'] == $adm_email1){?>
					<span style="float: right;"><a style="color: #000;border-bottom: 1px solid #000;" href="/admin.php?fnc=re_art&id=<?=$art['id']?>">Редактировать<br></a></span><?}?>
					<p>Дата публикации: <?=$art['date']?></p>
				</div>

				</article>
				<h1><hr></h1>
			<?}
		}
		
?>
<?php
if(!$_SESSION['user']){
	echo 'Увы, прокомментировать могут только <a href="index.php">авторизованные пользователи.</a>';
}else{
  if (isset($_POST['button'])) {
     $name = htmlspecialchars($_POST["name"]);
  $page_id = $_GET['id'];
  $text_comment = htmlspecialchars($_POST["text_comment"]);
 
  mysqli_query($connect,"INSERT INTO `comments` (`name`, `page_id`, `text_comment`, `date`) VALUES ('$name', '$page_id', '$text_comment', NOW())");
  echo "<script>window.location.href = 'news-and-comment.php?id=" . $_GET['id'] . "'</script>";
  }

 
?>
<form name="comment" action="news-and-comment.php?id=<?=$_GET['id']?>" method="post">
  <p>
    
    <input type="hidden" name="name" required="" value="<?=$_SESSION['user']['full_name'];?>" />
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="text_comment" cols="30" rows="5" required=""></textarea>
  </p>
  <p>
    <button type="submit" value="Отправить" name="button">Отправить</button>
  </p>
</form><hr>
<?php
  $page_id = $_GET['id'];

  $result_set = mysqli_query($connect, "SELECT * FROM `comments` WHERE `page_id`='$page_id'"); 
  while ($row = $result_set->fetch_assoc()){?>
  	<h3 style="font-family: 'Pacifico', cursive;
"><?print_r($row['name']);?></h3>
    <h5 style="font-family: 'Amatic SC', cursive;
 font-size: 100%" ><?print_r($row['text_comment']);?><em class='datatime'><?print_r($row['date']);?></h4></em>
 <hr>
 <?
  } //Закрывает вайл

}//Закрывает главный элcе
?>
