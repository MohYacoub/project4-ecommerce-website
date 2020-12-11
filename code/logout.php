<?php
session_start();
unset($_SESSION['superadmin']);
unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['thankyou']);
unset($_SESSION['qtyarr']);
unset($_SESSION['cart']);
unset($_SESSION['total']);
unset($_SESSION['totalnew']);
unset($_SESSION['new_user']);

header("location:index.php");
?>