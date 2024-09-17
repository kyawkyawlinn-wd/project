<?php

include "../vendor/autoload.php";

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

Auth::check();
HTTP::redirect();

$sql = new MySQL;
$sql->connect();

$user = new UsersTable;
$user->insert();

$faker = Faker::create();
echo $faker->name;
