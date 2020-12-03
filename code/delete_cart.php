<?php
session_start();

$key = $_GET['key'];

unset($_SESSION["cart"]["$key"]);
header("location:cart.php");
 ?>
