<?php
session_start();
$connect = mysqli_connect('localhost','root', '', 'test');
if(!$connect){
	die('Error connect database!');
}
$adm_email = "Mhlvvln@gmail.com";
$adm_email1 = "mhlvvln@gmail.com";
$mysqli = new mysqli("localhost", "root", "", "test");
?>