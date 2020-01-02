<?php
session_start();
require 'vendor/connect.php';
$query = mysqli_query($connect, "SELECT * FROM `timetable`");
$row = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Расписание</title>
	<style type="text/css">
		body{
			background-color: #e3e3e3;
		}
		#table{
			border: 10px dashed blue;
			height: 550px;
			margin-top: 5%;
			width: 50%;
			justify-content: center;
			border-radius: 5%;
			text-align: center;
			font-size: 150%;
		}

		#color-text{
			color: red;
		}
		input{
	margin: 10px 0;
	padding: 10px;
	border: unset;
	border-bottom: 2px solid #e3e3e3;
	outline: none;
	width: 40%;
}
form{
	margin-top: 5%;
}


	</style>
</head>
<body>
<?php
$dayweek = $_POST['dayweek'];
$first = $_POST['first'];
$second = $_POST['second'];
$tri = $POST['tri'];
$chetire = $_POST['chetire'];
$pyat = $_POST['pyat'];
$shest = $_POST['shest'];
$sem = $_POST['sem'];
$vosem = $_POST['vosem'];
$one = 1;
?>
<?php
	if (!$row){//открыли
		echo "Катюха еще не выложила расписания или ошибка";
	}//закрыли. проблем с иф нет
	else{//открыли
while ($art = mysqli_fetch_assoc($query)) {?>
<center><h1>Расписание</h1></center>
<center><div id = "table">
<div id="color-text"><h1 style="color: blue;"><?=$art['dayweek']?></h1><hr />
<?=$art['first']?><br>	<hr />
<?=$art['second']?><br>	<hr />
<?=$art['tri']?><br>	<hr />
<?=$art['chetire']?><br>	<hr />
<?=$art['pyat']?><br>	<hr />
<?=$art['shest']?><br>	<hr />
<?=$art['sem']?><br>	<hr />
<?=$art['vosem']?><br>	
</div></center></div>
<?}?>
<?php
if ($_SESSION['user']['email'] == 'katya.slepak7@gmail.com') {?>
<form action="timetable.php" method="POST"><center>
	<input type="text" name="dayweek" placeholder="День недели, который нужно вывести" required=""><br />
	<input type="text" name="first" placeholder="Первый урок" required=""><br />
	<input type="text" name="second" placeholder="Второй урок" required=""><br />
	<input type="text" name="tri" placeholder="Третий урок" required=""><br />
	<input type="text" name="chetire" placeholder="Четвертый урок" required=""><br />
	<input type="text" name="pyat" placeholder="Пятый урок" required=""><br />
	<input type="text" name="shest" placeholder="Шестой урок" required=""><br />
	<input type="text" name="sem" placeholder="Седьмой урок" required=""><br />
	<input type="text" name="vosem" placeholder="Восьмой урок"required=""><br />
	<input type="submit" name="submit"><br /></center>
</form>
<?}?>
<?php
if (isset($_POST['submit'])) {
	mysqli_query($connect, "UPDATE `timetable` SET `dayweek` = '{$_POST['dayweek']}', `first` = '{$_POST['first']}', `second` = '{$_POST['second']}', `tri` = '{$_POST['tri']}', `chetire` = '{$_POST['chetire']}', `pyat` = '{$_POST['pyat']}', `shest` = '{$_POST['shest']}', `sem` = '{$_POST['sem']}', `sem` = '{$_POST['sem']}' WHERE `id` = '$one'");
}

}?>
</body>
</html>
