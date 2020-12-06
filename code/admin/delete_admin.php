

<?php
session_start();

include('partials/connection.php');

$query = "delete from admins where admin_id = {$_GET['id']}";

mysqli_query($conn, $query);
$_SESSION['deleted_admin'] = "The Admin Deleted Successfully";

header("location:manage_admin.php");

?>

