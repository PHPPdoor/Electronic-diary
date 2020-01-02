<?php
session_start();
require 'vendor/connect.php';
$fioname =  $_SESSION['user']['full_name'];
$query = mysqli_query($connect, "SELECT * FROM `marks` WHERE `FIO` = '$fioname'");
$row = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Мои оценки</title>
	<meta charset="utf-8">
	<style>
		body{
			background-color: #e3e3e3
		}
		.markers{
			font-size: 25px;
		}
		em{
			color: red;
		}
		.divaha{
	float: right;
	
	margin-top: -1%;
		}
a{
	display: ruby;
	margin-top: -6px;
	color: #7c9ab7;
	font-weight: bold;
	text-decoration: none;
}

marquee{
margin-top: 10%;
}
	</style>

</head>
<script language='JavaScript1.2'>
<!--
if (window.Event)
document.captureEvents(Event.MOUSEUP);
 
function nocontextmenu() {
event.cancelBubble = true, event.returnValue = false;
 
return false;
}
 
function norightclick(e) {
if (window.Event) {
if (e.which == 2 || e.which == 3) return false;
}
else if (event.button == 2 || event.button == 3) {
event.cancelBubble = true, event.returnValue = false;
return false;
}
}
 
if (document.layers)
document.captureEvents(Event.MOUSEDOWN);
 
document.oncontextmenu = nocontextmenu;
document.onmousedown = norightclick;
document.onmouseup = norightclick;
//--> </script>
	<div class = "divaha">
	<a href="profile.php"><?=$_SESSION['user']['email']?></a>
	<a href="articles.php">Новости</a>
	<a href="marks.php">Мои оценки</a>
	<a href="logout.php">Выход.</a>
</div>
<body>
<center><h1>Оценки пользователя <em><?=$_SESSION['user']['full_name']?></em></h1></center><br>
<?php
if(!$row){
	echo "Оценки еще не выставили, а может у вас с именем проблемы.";
}else{
	while ($art = mysqli_fetch_assoc($query)) {//Открыли, не забудь закрыть вайл?>
			<div class="markers">
			Алгебра: <?=$art['Alg']?><br>
			Геометрия: <?=$art['geometr']?> <br>
			Информатика: <?=$art['inform']?> <br>
			Физика: <?=$art['physic']?><br>
			География: <?=$art['geography']?> <br>
			Экономика: <?=$art['econom']?><br>
			УГДД: <?=$art['ugdd']?><br>
			Русский язык: <?=$art['russian']?><br>
			Литература: <?=$art['literature']?><br>
			Химия: <?=$art['chemistry']?><br>
			Биология: <?=$art['byolog']?><br>
			Физическая культура:<?=$art['fizra']?><br>
			Компьютерная графика: <?=$art['kg']?><br>
			НВП: <?=$art['nvp']?><br>
			МСП: <?=$art['msp']?><br>
			Укр. яз. и лит.: <?=$art['ukr']?><br>
		</div>
	<?php
}
}?>


<marquee

height=30 width=100%

hspase=5 vspase=5 align=middle

bgcolor=white

direction=left loop=infinite behavior=scroll

scrollamount=20 scrolldelay=100><font size="5" color="blue">
Уважаемый родитель, после просмотра оценок, пожалуйста, перезагрузите страницу и проверьте их еще раз. Спасибо.</font>

</marquee>
</body>
</html>