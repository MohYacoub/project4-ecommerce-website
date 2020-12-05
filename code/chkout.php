<?php
session_start();
include('partails/public_head.php');
include('partails/public_header.php');
include('admin/partials/connection.php');

/* include_once 'admin/partials/connection.php';
 */
?>
<?php

if(isset($_SESSION['user'])){
$total = $_SESSION['total'];
$name = $_SESSION['user'];
$id = $_SESSION['cust_id'];
$phone = $_SESSION['phone'] ;
$address = $_SESSION['address'] ;

$query = "INSERT INTO orders(cust_id,order_address,order_total) VALUES ({$id},'$address',$total)";
$result = mysqli_query($conn,$query);

$query2 = "SELECT order_id FROM orders order by DESC LIMIT 1";
$result2 = mysqli_query($conn,$query2);
$row = mysqli_fetch_assoc($result2);
$orderid = $row['order_id'];


foreach($_SESSION['cart'] as $key => $value){

    $pro_id = $value['pro_id'];
    $qty = $value['qty'];

    $query3 = "INSERT INTO order_details(order_id,pro_id,qty) VALUES ($orderid,$pro_id,$qty)";
    $result3 = mysqli_query($conn,$query3);
}


echo $name . $id . $phone . $address;
} 
else {

    header('location: login2.php');
    
}
?>