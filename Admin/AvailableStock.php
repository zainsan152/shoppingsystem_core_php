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
    <h2 style="margin-top:5%">Item stock Dashboard </h2>
   </header>
     <?php
include ("db_connection.php");
error_reporting(0);
     $query=  "SELECT category.name as cat, brand.name , tblproduct.name as itemname ,tblproduct.price,tblproduct.cost_price,tblproduct.Stock  FROM brand inner join category on brand.category_Id = category.category_Id  inner join tblproduct on brand.category_Id = tblproduct.category_Id and brand.brand_Id = tblproduct.brand_Id";
  $data=mysqli_query($db_connection ,$query);
  $total=mysqli_num_rows($data);
  if ($total != 0)
	  
  {
	  ?>
     
	 
      <form method="get">
	  <table style="margin-top:5%; " class="table table-condensed table-hover">
       <thead style="text-align:center">

       <th>Category</th>
       <th>Brand</th>
       <th>Item Name</th>
       <th>Selling Price</th>
       <th>Cost Price</th>
       <th>Stock</th>
 
  
   
	 
       </thead>
	 
	
	  <?php
	  while($result=mysqli_fetch_assoc($data))
	  {
		  
		  echo  "<tr>
	               
	                <td>   ".$result['cat']  ."    </td>
	                 <td>   ".$result['name']  ."    </td>
	                 <td>   ".$result['itemname']  ."    </td>
	                  <td>   ".$result['price']  ."    </td>
	                   <td>   ".$result['cost_price']  ."    </td>
	                    <td>   ".$result['Stock']  ."    </td>
	                
	                 
	                
					
					
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
 <div style="padding:40px;" class="row">
      <a href="index.php"><button class="btn btn-success">Back</button></a>
      </div>

</article> 


  </div>
</body>
</html>
