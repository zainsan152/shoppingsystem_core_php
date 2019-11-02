<?php
session_start();
if(!isset($_SESSION['user_info']))
{
    header('location:login.php');
}

?>


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
            <h3 style="margin-top:5%">Products</h3>
        </header>
        <div>
            <a href="Brand.php"><button class="btn btn-success pull-right">Create Brand</button></a>
        </div>
        <?php
        include ("db_connection.php");
        error_reporting(0);
        $query=  "SELECT category.name as cat, brand.name FROM brand inner join category on brand.category_Id = category.category_Id";
        $data=mysqli_query($db_connection ,$query);
        $total=mysqli_num_rows($data);
        if ($total != 0)

        {
        ?>


        <form method="get">
            <table style="margin-top:5%" class="table table-condensed table-hover">
                <thead>

                <th>Category</th>
                <th>Brand</th>




                </thead>


                <?php
                while($result=mysqli_fetch_assoc($data))
                {

                    echo  "<tr>
	               
	                <td>   ".$result['cat']  ."    </td>
	                 <td>   ".$result['name']  ."    </td>
	                
	                 
	                
					
					
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
