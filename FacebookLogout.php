<?php
include './FacebookCek.php';
session_destroy();
unset($_SESSION['access_token']);
header("Location:login.php");
?>