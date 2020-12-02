<?php
include('partials/connection.php');

$query = "delete from admins where admin_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_admin.php");


?>