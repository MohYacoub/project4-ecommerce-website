<?php
global $conn;
$conn = mysqli_connect("localhost", "root","","testecommerce");


?>
<?php


function Create(){

    if(isset($_POST['submit'])){
        $admin_name = $_POST['adminname'];
    $admin_email = $_POST['adminemail'];
    $admin_password = $_POST['adminpassword'];

    global $conn;

    $query = "INSERT INTO admin(admin_email,admin_password,admin_fullname)
              VALUES ('$admin_email','$admin_password','$admin_name')";
    
    $result = mysqli_query($conn,$query);
    }   
              
};

function Read(){

    global $conn;
    $query = "SELECT * From admin";
    global $result;
    $result = mysqli_query($conn,$query);

}

?>