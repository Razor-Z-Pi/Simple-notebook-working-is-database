<?php
function connect()
{
  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "GuestBook";
  $connect = mysqli_connect($server, $user, $password, $db) or die("Ошибка подключения БД!!!");
  return $connect;
}