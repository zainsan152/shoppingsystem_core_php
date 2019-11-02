customerId<html>
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
            <h3 style="margin-top:5%">All Pending Orders</h3>
        </header>
        <?php


      //  $customerid = $_POST['vendor'];


        include('db_connection.php');
        error_reporting(0);
        $query=  "SELECT order_date,order_Id, customer.Name,shiping_address ,amount,status,delivery_date FROM sale_order join customer on sale_order.user_Id = customer.customerId where sale_order.status = 'Pending' ";
        $data=mysqli_query($db_connection ,$query);
        $total=mysqli_num_rows($data);
        if ($total != 0)

        {
        ?>


        <table style="margin-top:5%" class="table">
            <thead>

            <th>Order Id</th>
            <th>Order Date</th>

            <th>Customer Name</th>
            <th>Shipping Address</th>
            <th>Order Amount</th>
            <th>Delivery Date</th>
            <th>Detail</th>

            <th colspan ="2"> Status </th>
            </thead>


                <?php
                while($result=mysqli_fetch_assoc($data))
                {
                    $order = $result['order_Id'];
                    echo  "<tr>
	               
	                 <td>   ".$result['order_Id']  ."    </td>
	                <td>   ".$result['order_date']  ."    </td>
	               
	                 <td>  ".$result['Name']."    </td>
	                 <td> ".$result['shiping_address']."    </td>
	                 <td> ".$result['amount']."    </td>
	                   <td> ".$result['delivery_date']."    </td>
	                  <td> ".$result['status']."    </td>
					 
	                  <td>
					<form  action='Order_detail.php' method='post'>
					<input type='text' name='order' value='$order' hidden>
				
					<button type='submit' class='btn btn-default'>Detail</button></a>
					</form>
					</td>
	                
					<td><input type='checkbox' name='check_list[]' value='".$result['order_Id']."'></td>
					
	           </tr>";
                }
                }
                else
                {
                    echo " no record found";
                }


                ?>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>






    </article>


</div>
</body>
</html>
