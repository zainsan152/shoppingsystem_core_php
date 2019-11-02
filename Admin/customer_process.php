<?php

include("db_connection.php");

$cname=$_POST['name'];
$email =$_POST['email'];
$phone = $_POST['phone'];
$add=$_POST ['address'];

$regin=$_POST['state'];
$cty=$_POST ['City'];

	
			$query= "INSERT INTO customer ( Name, email,phone,Address,City,State)VALUES('$cname','$email','$phone','$add','$cty','$regin')";
            $data=mysqli_query($db_connection,$query);
     if($data)
    {
		header('location:customer_view.php');
	//echo "data inserted into database";
    }
		
		

?>