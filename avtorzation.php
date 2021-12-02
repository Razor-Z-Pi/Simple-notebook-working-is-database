<?php
session_start();
require_once "./DataBase/link.php";
$link = connect();

if (!empty($_POST["login"]) && !empty($_POST["password"])) {
  $login = $_POST["login"];
  $password = $_POST["password"];
  
  
  $validate = mysqli_query($link,  "SELECT * FROM login");
  $users = mysqli_fetch_all($validate, MYSQLI_ASSOC);
  
  foreach ($users as $value) {
    if ($value["login"] == $login) {
      $user = $login;
    }
    if ($value["password"] == $password) {
      header("Location: profile.php");
      die();
    }
  }
  $_SESSION["ERROR"] = "";
  home();
} else {
  home();
}
home();

function home() {
  header("Location: index.php");
  die();
}