<?php
session_start();
include('partials/connection.php');

$query = "delete from categories where cat_id = {$_GET['id']}";

mysqli_query($conn, $query);
$_SESSION['deleted_category'] = "The Category Deleted Successfully";

header("location:manage_category.php");


?>