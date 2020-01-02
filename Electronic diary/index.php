<?php
session_start();
if($_SESSION['user']){
	header('Location: profile.php');
}
setcookie("full_name", $_SESSION['user']['full_name'], time() + 3600 * 24 * 30);
setcookie("password", $_SESSION['user']['password'], time() + 3600 * 24 * 30);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing: border-box;
}

body{
    font-family: Montserrat, sans-serif;
    height: 100vh;
    background-color: #e3e3e3;
    overflow: hidden;
}

form{
    display: flex;
    flex-direction: column;
    width: 400px;
    font-family: Montserrat, sans-serif;
    display: flex;
    align-items: center;
    height: 100vh;
    justify-content: center;
    background-color: #e3e3e3;

}
input{
    margin: 10px 0;
    padding: 10px;
    border: unset;
    border-bottom: 2px solid #e3e3e3;
    outline: none;
    width: 75%;
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
h1{
    max-width: 45%;
    margin-top: 1%;
    float: none;
    margin-left: 5%;
}
.message{
    border: 2px solid #7c9ab7;;
    border-radius: 3px;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}
label{
    font-size: 30px;
}
w{
    color: #6a50ad;
    display: block;
    float: right;
    text-transform: uppercase;
    margin-top: -5%;
    margin-right: 5%;
    max-width: 40%;
}
</style>
</head>
<h1>Электронный дневник</h1>
<body>

<!-- Форма авторизации -->
<center>
    <form action="vendor/signin.php" method="post">
        <label>Логин</label>
        <input type="text" name="full_name" placeholder="Введите свой логин" >
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" >
        <button type="submit">Войти</button>
        <p>
           <!-- У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!-->
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
    <w>Design by Misha Vavilin</w>

</center>
</body>
</html>
