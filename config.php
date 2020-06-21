<?php
ob_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'macs');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$database = mysqli_select_db($connection,DB_DATABASE) or die(mysqli_error());
?>