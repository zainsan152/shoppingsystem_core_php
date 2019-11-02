<?php

$itemname =$_POST['name'];
$unit=$_POST['unit'];




//db connection;
include('db_connection.php');
//save data
$save_data="insert into category(name)values ('$itemname')";
if (mysqli_query($db_connection,$save_data))
{
	header('location:product_view.php');
	echo "<h2>Data Saved</h2>";
}
else
{
	echo "Error in query = ".mysqli_error($db_connection);
}






?>
