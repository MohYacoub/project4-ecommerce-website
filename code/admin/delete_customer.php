<?php
session_start();
include('partials/connection.php');

$query = "delete from customers where cust_id = {$_GET['id']}";

mysqli_query($conn, $query);
$_SESSION['deleted_customer'] = "The Customer Deleted Successfully";
header("location:manage_customer.php");


?>