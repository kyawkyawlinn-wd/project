<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$mysql = new MySQL;
$table = new UsersTable($mysql);

$id = $table->insert([
  "name" => "Alice",
  "email" => "alice@example.com",
  "phone" => "09432482323",
  "address" => "Some Address",
  "password" => "password",
]);

echo $id;