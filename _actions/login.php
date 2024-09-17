<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$user = $table->find($_POST['email'], $_POST['password']);



if($user) {
  if($user->suspended) {
    HTTP::redirect("/index.php", "suspended=user");
  }
  
  session_start();
  $_SESSION['user'] = $user;
  HTTP::redirect("/profile.php");
} else {
  HTTP::redirect("/index.php", "incorrect=login");
}