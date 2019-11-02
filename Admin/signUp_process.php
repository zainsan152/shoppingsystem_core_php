<?php

include("db_connection.php");

$cname=$_POST['name'];
$email =$_POST['email'];
$password = $_POST['password'];


	
			$query= "INSERT INTO users ( Name, email,password)VALUES('$cname','$email','$password')";
            $data=mysqli_query($db_connection,$query);
     if($data)
    {
		header('location:login.php');
	//echo "data inserted into database";
    }
		
		

?>