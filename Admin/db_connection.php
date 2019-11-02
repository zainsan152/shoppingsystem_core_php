<?php

$host = "localhost";
$db_user = "root";
$password = "";
$name = "onlineshop";

$db_connection = mysqli_connect($host , $db_user,$password,$name);

if($db_connection)
{
	
}
else
{
	echo "Error in DB = ".mysqli_connect_error();;
}








?>