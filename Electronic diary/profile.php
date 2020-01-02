<?php
session_start();
require 'vendor/connect.php';
$query = mysqli_query($connect, "SELECT * FROM `dz`");
$row = mysqli_num_rows($query);
if(!$_SESSION['user']){
	header('Location: index.php');
}

setcookie('algebra', $_POST['algebra'], time() + 3600*24*7);
setcookie('geometry', $_POST['geometry'], time() + 3600*24*7);
setcookie('informatic', $_POST['informatic'], time() + 3600*24*7);
setcookie('physic', $_POST['physic'], time() + 3600*24*7);
setcookie('geography', $_POST['geography'], time() + 3600*24*7);
setcookie('ekonom', $_POST['ekonom'], time() + 3600*24*7);
setcookie('ygdd', $_POST['ygdd'], time() + 3600*24*7);
setcookie('russian', $_POST['russian'], time() + 3600*24*7);
setcookie('literature', $_POST['literature'], time() + 3600*24*7);
setcookie('chemistry', $_POST['chemistry'], time() + 3600*24*7);
setcookie('phis', $_POST['phis'], time() + 3600*24*7);
setcookie('kg', $_POST['kg'], time() + 3600*24*7);
setcookie('nvp', $_POST['nvp'], time() + 3600*24*7);
setcookie('msp', $_POST['msp'], time() + 3600*24*7);
setcookie('yliterature', $_POST['yliterature'], time() + 3600*24*7);
setcookie('ist', $_POST['ist'], time() + 3600*24*7);
setcookie('vist', $_POST['vist'], time() + 3600*24*7);
setcookie('obsh', $_POST['obsh'], time() + 3600*24*7);
setcookie('eng', $_POST['eng'], time() + 3600*24*7);
setcookie('biology', $_POST['biology'], time() + 3600*24*7);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Профиль</title>

	<style type="text/css">
		*{
	margin:0 auto;
	padding:0;
	
}

body{
	font-family: Montserrat, sans-serif;	
	height: 100vh;
	background-color: #ededed;
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
.divaha{
	float: right;
	display: block;
	margin-top: -1%;
}

.message{
	border: 2px solid #7c9ab7;;
	border-radius: 3px;
	padding: 10px;
	text-align: center;
	font-weight: bold;
}
.color-dz{
	color:#0020ed ;
	font-size: 150%;
	text-align: center;
	border: 5px solid #0020ed;
	width: 75%;
	margin-top: 1%;
	border-radius: 5%;
}
span{
	padding-right: 50%;
	
}
em{
	color: red;
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
<body>
	<h2><a href="timetable.php"><?=$_SESSION['user']['full_name']?></h2></a>
	<div class = "divaha">
	<a href="profile.php"><?=$_SESSION['user']['email']?></a>
	<a href="articles.php">Новости</a>
	<a href="marks.php">Мои оценки</a>
	<a href="received-messages.php">Полученные сообщения</a>
	<a href="logout.php">Выход.</a>
</div>
<div class = "border-dz">
	<?php
	if (!$row){//открыли
		echo "ДЗ нет, или ошибка";
	}//закрыли. проблем с иф нет
	else{//открыли
while ($art = mysqli_fetch_assoc($query)) {?>
		<h1><center><br>Домашние задания</center></h1>
			<div class = "color-dz">
			<span>Алгебра: <em><?=$art['alg']?><br></span>	<hr></em>
			<span>Геометрия: <em><?=$art['geom']?><br></span><hr></em>
			<span>Информатика:  <em><?=$art['informatic']?><br></span>	<hr></em>
			<span>Физика: <em><?=$art['fizika']?><br></span>	<hr></em>
			<span>География: <em><?=$art['geogr']?> <br></span>	<hr></em>
			<span>Экономика: <em><?=$art['ekonom']?><br></span>	<hr></em>
			<span>УГДД: <em><?=$art['ugdd']?><br></span>	<hr></em>
			<span>Русский язык: <em><?=$art['russian']?><br></span>	<hr></em>
			<span>Литература: <em><?=$art['literature']?><br></span><hr></em>
			<span>Химия: <em><?=$art['him']?><br></span>	<hr></em>
			<span>Биология: <em><?=$art['biology']?><br></span>	<hr></em>
			<span>Физическая культура: <em><?=$art['fizra']?><br></span></em>	<hr>
			<span>Компьютерная графика: <em><?=$art['kg']?><br></span>	<hr></em>
			<span>НВП: <em><?=$art['nvp']?><br></span>	<hr></em>
			<span>МСП: <em><?=$art['msp']?><br></span>	<hr></em>
			<span>Укр. яз. и лит.: <em><?=$art['yliterature']?><br></span><hr></em>
			<span>История: <em><?=$art['ist']?><br></span>	<hr></em>
			<span>Всеобщая история: <em><?=$art['vist']?><br></span>	<hr></em>
			<span>Обществознание: <em><?=$art['obsh']?><br></span></em><hr>
			<span>Английский язык: <em><?=$art['eng']?><br></span></em>
</div>
</div>
<?php
}
}//закрываем елсе
//close php?>
<?php
if($_SESSION['user']['email'] == 'katya.slepak7@gmail.com'){
	$algebra = mysqli_real_escape_string($connect, $_POST['algebra']);
	$geometry = mysqli_real_escape_string($connect, $_POST['geometry']);
	$informatic = mysqli_real_escape_string($connect, $_POST['informatic']);
	$physic = mysqli_real_escape_string($connect, $_POST['physic']);
	$geography = mysqli_real_escape_string($connect, $_POST['geography']);
	$ekonom = mysqli_real_escape_string($connect, $_POST['ekonom']);
	$ygdd = mysqli_real_escape_string($connect, $_POST['ygdd']);
	$russian = mysqli_real_escape_string($connect, $_POST['russian']);
	$literature = mysqli_real_escape_string($connect, $_POST['literature']);
	$chemistry = mysqli_real_escape_string($connect, $_POST['chemistry']);
	$phis = mysqli_real_escape_string($connect, $_POST['phis']);
	$kg = mysqli_real_escape_string($connect, $_POST['kg']);
	$nvp = mysqli_real_escape_string($connect, $_POST['nvp']);
	$msp = mysqli_real_escape_string($connect, $_POST['msp']);
	$yliterature = mysqli_real_escape_string($connect, $_POST['yliterature']);
	$ist = mysqli_real_escape_string($connect, $_POST['ist']);
	$vist = mysqli_real_escape_string($connect, $_POST['vist']);
	$obsh = mysqli_real_escape_string($connect, $_POST['obsh']);
	$eng = mysqli_real_escape_string($connect, $_POST['eng']);
	$biology = mysqli_real_escape_string($connect, $_POST['biology']);
	?>
	<h1><center>Катюха, по-братски, выставь дз пж</center></h1>
	<form method = "POST" action="profile.php">
			Алгебра: <input type="text" name="algebra" value= "<?=$_COOKIE['algebra']?>"><br><br>
			Геометрия: <input type="text" name="geometry" value= "<?=$_COOKIE['geometry']?>"><br><br>
			Информатика: <input type="text" name="informatic" value= "<?=$_COOKIE['informatic']?>"><br><br>
			Физика: <input type="text" name="physic" value= "<?=$_COOKIE['physic']?>"><br><br>
			География: <input type="text" name="geography" value= "<?=$_COOKIE['geography']?>"><br><br>
			Экономика: <input type="text" name="ekonom" value= "<?=$_COOKIE['ekonom']?>"><br><br>
			УГДД: <input type="text" name="ygdd" value= "<?=$_COOKIE['ygdd']?>"><br><br>
			Русский язык: <input type="text" name="russian"  value= "<?=$_COOKIE['russian']?>"><br><br>
			Литература: <input type="text" name="literature"  value= "<?=$_COOKIE['literature']?>"><br><br>
			Химия: <input type="text" name="chemistry"  value= "<?=$_COOKIE['chemistry']?>"><br><br>
			Биология: <input type="text" name="biology" value= "<?=$_COOKIE['biology']?>"><br><br>
			Физическая культура: <input type="text" name="phis" value= "<?=$_COOKIE['phis']?>"><br><br>
			Компьютерная графика: <input type="text" name="kg"  value= "<?=$_COOKIE['kg']?>"><br><br>
			НВП: <input type="text" name="nvp"  value = "<?=$_COOKIE['nvp']?>"><br><br>
			МСП: <input type="text" name="msp"  value= "<?=$_COOKIE['msp']?>"><br><br>
			Укр. яз. и лит.: <input type="text" name="yliterature"  value= "<?=$_COOKIE['yliterature']?>"><br><br><hr>
			История: <input type="text" name="ist"  value= "<?=$_COOKIE['ist']?>"><br><br><hr>
			Всеобщ. ист.: <input type="text" name="vist"  value= "<?=$_COOKIE['vist']?>" ><br><br><hr>
			Обществознание <input type="text" name="obsh"  value= "<?=$_COOKIE['obsh']?>"><br><br><hr>
			Английский язык: <input type="text" name="eng"  value= "<?=$_COOKIE['eng']?>" ><br>
			<input type="submit" name="">
		</form>
<?php

	# code...
$algebra = $_POST['algebra'];
$geometry = $_POST['geometry'];
$informatic = $_POST['informatic'];
$physic = $_POST['physic'];
$geography = $_POST['geography'];
$ekonom = $_POST['ekonom'];
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
$istRus = $_POST['ist'];
$vseoist = $_POST['vist'];
$obsh = $_POST['obsh'];
$eng = $_POST['eng'];
$dva = 3;
mysqli_query($connect,  "UPDATE  `dz` SET `alg` = '{$_POST['algebra']}', `geom` = '{$_POST['geometry']}', `geogr` = '{$_POST['geography']}', `fizika` = '{$_POST['physic']}', `fizra` = '{$_POST['phis']}', `ugdd` = '{$_POST['ygdd']}', `russian` = '{$_POST['russian']}', `literature` = '{$_POST['literature']}', `him` = '{$_POST['chemistry']}', `biology` = '{$_POST['biology']}', `nvp` = '{$_POST['nvp']}', `msp` = '{$_POST['msp']}', `ekonom` = '{$_POST['ekonom']}', `kg` = '{$_POST['kg']}', `informatic` = '{$_POST['informatic']}', `obsh` = '{$_POST['obsh']}', `ist` = '{$_POST['ist']}', `vist` = '{$_POST['vist']}', `yliterature` = '{$_POST['yliterature']}', `eng` = '{$_POST['eng']}'  WHERE `id` = '$dva'");
}
?>
<footer>
<marquee style="margin-top: 9%;"

height=30 width=100%

hspase=5 vspase=5 align=middle

bgcolor=white

direction=left loop=infinite behavior=scroll

scrollamount=20 scrolldelay=100><font size="5" color="blue">
Уважаемый родитель, после просмотра домашнего задания, пожалуйста, перезагрузите страницу и проверьте их еще раз. Спасибо.</font>
</marquee></footer>
</body>
</html>