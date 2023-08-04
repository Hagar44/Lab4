<?php


session_start();

session_unset();

$value = $_COOKIE['PHPSESSID'];

setcookie('PHPSESSID', $value, time() - 3600, '/');

session_destroy();


header('location:login.php');