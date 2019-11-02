<?php

include("db_connection_2.php");

$cname=$_POST['name'];
$email =$_POST['email'];
$phone = $_POST['phone'];
$add=$_POST ['address'];
$password = $_POST['password'];
$regin=$_POST['state'];
$cty=$_POST ['City'];


$query= "INSERT INTO customer ( Name, email,phone,Address,City,State,password)VALUES('$cname','$email','$phone','$add','$cty','$regin','$password')";
$data=mysqli_query($db_connection,$query);
if($data)
{
    header('location:../index.php');
    //echo "data inserted into database";
}



?>