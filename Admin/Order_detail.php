<html>
<style>
    .form-group{
        width:50%;
    }

</style>
<?php
require_once('header.php');
?>


<body>

<?php
require_once('nav.php');
?>

<div class="col-sm-9">
    <article>
        <header>
            <h3 style="margin-top:5%">Order Detail</h3>
        </header>
        <?php
       // session_start();

        include ("db_connection.php");

            $orderId = $_POST['order'];
       // $orderId =  $_SESSION['order'];
//print_r($_SESSION['order']) ;
        error_reporting(0);
        $query=  "SELECT order_Id , name , order_detail.price,Quantity,total_amount,image  FROM order_detail  inner join tblproduct on order_detail.item_id = tblproduct.code
  				Where order_detail.order_Id =  '$orderId'";
        $data=mysqli_query($db_connection ,$query);
        $total=mysqli_num_rows($data);
        if ($total != 0)

        {
        ?>


        <form method="get">
            <table style="margin-top:5%" class="table table-condensed table-hover">
                <thead>

                <th>Order Id</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Image</th>




                </thead>


                <?php
                while($result=mysqli_fetch_assoc($data))
                {


                    echo  "<tr>
	               
	                 <td>   ".$result['order_Id']  ."    </td>
	                 <td>  ".$result['name']."    </td>
					 <td>  ".$result['price']."    </td>
					  <td>  ".$result['Quantity']."    </td>
					   <td>  ".$result['total_amount']."    </td>
					   <td><img alt='' src=".$result['image']."></td>
	                
	                 
	                
					
					
	           </tr>";
                }
                }
                else
                {
                    echo " no record found";
                }


                ?>





            </table>
        </form>


    </article>


</div>
</body>
</html>
