<?php
include('partials/connection.php');
?>
<?php
$pro_id = $_GET['id'];
$query  = "DELETE FROM products WHERE pro_id = {$pro_id}";
$result = mysqli_query($conn,$query);
header('location:manage_products.php');

?>