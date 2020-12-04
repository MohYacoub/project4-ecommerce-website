<?php
session_start();

if(isset($_GET['key1'])){
$key = $_GET['key1'];

unset($_SESSION["cart"]["$key"]);
$url = $_SESSION['page'];
header("Location: $url");
}

if(isset($_GET['key2'])){
$key = $_GET['key2'];

unset($_SESSION["cart"]["$key"]);
header("location:cart.php");
}

 ?>
