<?php
require "vendor/connect.php";
session_start();
  $name = $_POST["name"];
  $page_id = $_POST["page_id"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);
  $text_comment = htmlspecialchars($text_comment);
  $mysqli = new mysqli("localhost", "root", "", "test");
  $mysqli->query("INSERT INTO `comments` (`name`, `page_id`, `text_comment`) VALUES ('$name', '$page_id', '$text_comment')");
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
<form name="comment" action="comment.php" method="post">
  <p>
    <label>Имя:</label>
    <input type="text" name="name" required="" />
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="text_comment" cols="30" rows="5" required=""></textarea>
  </p>
  <p>
    <input type="hidden" name="page_id" value="150" />
    <input type="submit" value="Отправить" />
  </p>
</form><hr>
<?php
  $page_id = 150;
  $mysqli = new mysqli("localhost", "root", "", "test");
  $result_set = $mysqli->query("SELECT * FROM `comments` WHERE `page_id`='$page_id'"); 
  while ($row = $result_set->fetch_assoc()) {?>
    <h3><?print_r($row['name']);?></h3>
    <h5><?print_r($row['text_comment']);?></h5><hr>
<?
    
  }
?>