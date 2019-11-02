<?php

include("db_connection.php");

//print_r($_POST['check_list']);

$getvalue =$_POST['check_list'];

//print_r($getvalue);
// Loop to store and display values of individual checked checkbox.
foreach( $getvalue as $selected){


    echo $selected ."<br>";
    $update=  "update sale_order set status = 'Completed' WHERE order_Id = '$selected' ";
    $data=mysqli_query($db_connection ,$update);

}


header('location:sale_order.php');

	








 
 


?>