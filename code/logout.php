<?php
session_start();
unset($_SESSION['superadmin']);
unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['thankyou']);
unset($_SESSION['qtyarr']);
unset($_SESSION['cart']);

header("location:index.php");
?>