<?php

include("db_connection.php");


$cname=$_POST["name"];


    $categoryId = $_POST['category_Id'];
    echo $_POST['category_Id'];
echo $_POST['name'];

    $query= "INSERT INTO brand ( name, category_Id)VALUES('$cname','$categoryId')";
   // mysqli_query($db_connection,$query);
if (mysqli_query($db_connection,$query))
{
    header('location:brand_view.php');
    echo "<h2>Data Saved</h2>";
}
else
{
    echo "Error in query = ".mysqli_error($db_connection);
}

//$categoryId = $_POST["category_Id"];







?>