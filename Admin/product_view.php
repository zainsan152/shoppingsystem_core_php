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
     <a href="product.php"><button class="btn btn-success pull-right">Create Product</button></a>
     </div>
     <?php
include ("db_connection.php");
error_reporting(0);
  $query=  "SELECT * FROM category";
  $data=mysqli_query($db_connection ,$query);
  $total=mysqli_num_rows($data);
  if ($total != 0)
	  
  {
	  ?>
     
	 
      <form method="get">
	  <table style="margin-top:5%" class="table table-condensed table-hover">
       <thead>
	 
	  <th>Name</th>

 
  
   
	  <th colspan ="2"> Operations </th>
       </thead>
	 
	
	  <?php
	  while($result=mysqli_fetch_assoc($data))
	  {
		  
		  echo  "<tr>
	               
	                 <td>   ".$result['name']  ."    </td>
	                
	                
	                 
	                
					<td><button class='btn btn-primary btn-sm'><a href='update.php?cmname=$result[customername]&addre=$result[Address]&city=$result[City]&Reg=$result[Region]&pcode=$result[PostelCode]&country=$result[Country]&phn=$result[Phone]&fax=$result[Fax]'>    </a>Edit</button> </td>
					
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
