<?php
include('partials/connection.php');

$query = "delete from customers where cust_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_customer.php");


?>