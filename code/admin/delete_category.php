<?php
include('partials/connection.php');

$query = "delete from categories where cat_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_category.php");


?>