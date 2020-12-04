
<?php
//this page made by feras 

?>
<?php


if(isset($_SESSION['superadmin'])){
    
    // header('location:manage_admin.php');
} 
elseif(isset($_SESSION['admin'])){
    // header('location:manage_category.php');
   
}
?>
<?php
include_once 'partials/connection.php';
include('partials/header_admin.php');
?>

<?php
include('partials/footer_admin.php');
?>