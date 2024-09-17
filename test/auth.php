<?php

include("../vendor/autoload.php");

use Helpers\Auth;

$auth = Auth::check();
print_r($auth);