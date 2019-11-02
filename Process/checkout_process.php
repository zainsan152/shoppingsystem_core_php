<?php
session_start();

require_once ("db_connection_2.php");

if (!isset($_SESSION['user_info']))
{
    header('location:../register.php');
}
else{


   $customerId =  $_SESSION['user_info'];
//echo $customerId;

$price =   $_SESSION["total_amount"];
//echo $price;
 $_SESSION["cart_item"];

 $payment = $_POST["paymentType"];
 $address = $_POST["address"];
 $city = $_POST["city"];
 $deliverydate = $_POST["date"];
 $code = $_POST["code"];
//print_r( $_SESSION["cart_item"]);
$completeAddress = $address .','.$city;

$select = "select order_Id   From sale_order order by order_Id desc";
$getID=mysqli_query($db_connection ,$select);
$id=mysqli_fetch_assoc($getID);
print_r( $id);
$ordrid = $id['order_Id'];

$ordrid ++;
echo $deliverydate;
$today = date("Y/m/d");
    $order =  "INSERT INTO sale_order (order_Id, order_date,user_id,amount,shiping_address,status,delivery_date) Values('$ordrid','$today','$customerId' , '$price' , '$completeAddress' ,'Pending','$deliverydate','$payment') ";
    $data=mysqli_query($db_connection ,$order);


    foreach ($_SESSION["cart_item"] as $item)
    {

        $itemName =  $item["name"] ;
        $itemcode =  $item["code"] ;
        $quantity =  $item["quantity"] ;
        $itemprice =  $item["price"] ;

        $brandid = 1;

        $itemdata="Select * from tblproduct where code = '$itemcode'";
        $execute = mysqli_query($db_connection,$itemdata);
        $result=mysqli_fetch_assoc($execute);

        $lessstock = $result['Stock'];
       // echo $lessstock;
        if($lessstock < $quantity)
        {

            echo "<h1> Order Quantity greater than to stock quantity : </h1>";

            break;
        }
        else {


            $totalstock = $lessstock - $quantity;
            echo $totalstock;
            $update_data = "update tblproduct set Stock = '$totalstock' where code = '$itemcode'";
            mysqli_query($db_connection, $update_data);
            $total_amount = $quantity * $itemprice;
            echo $itemName . "<br>";

            $save_order_detail = "Insert into order_detail (order_Id ,user_id ,item_id ,price,	Quantity,total_amount,brand_Id) Values('$ordrid','$customerId' , '$itemcode','$itemprice' , '$quantity' ,'$total_amount','$brandid') ";
            $data = mysqli_query($db_connection, $save_order_detail);

        }

    }


    unset($_SESSION['cart_item']);
header('location:../order_success.php');
}
?>