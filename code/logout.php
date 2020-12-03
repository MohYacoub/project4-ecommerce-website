<?php
session_start();
unset($_SESSION['superadmin']);
unset($_SESSION['admin']);
unset($_SESSION['user']);

header("location:index.php");
?>