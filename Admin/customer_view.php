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
     
     <header style="border-bottom:#999 1px">
     <h3 style="margin-top:5%">Customers</h3>
     
     </header>
     <div>
     <a href="Customer.php"><button class="btn btn-success pull-right">Create Customer</button></a>
     </div>
     <?php
include ("db_connection.php");
error_reporting(0);
  $query=  "SELECT * FROM customer";
  $data=mysqli_query($db_connection ,$query);
  $total=mysqli_num_rows($data);
  if ($total != 0)
	  
  {
	  ?>
      
	  
	  <table style="margin-top:5%" class="table table-condensed table-hover">
       <thead>
	 
	  <th>Name</th>
   <th>Email</th>
   <th>Phone</th>
   <th>Address</th>
   <th>State</th>
   <th>City</th>
   

       </thead>
	 
	
	  <?php
	  while($result=mysqli_fetch_assoc($data))
	  {
		  
		  echo  "<tr>
	               
	                 <td>   ".$result['Name']  ."    </td>
	                 <td>  ".$result['email']."    </td>
	                 <td> ".$result['phone']."    </td>
	                 <td> ".$result['Address']."    </td>
	                 <td>   ".$result['State']."  </td>
	                 <td>   ".$result['City']." </td>
	                
			
					
	           </tr>";
	  }
  }
  else 
  {
	  echo " no record found";
  }

 
?> 

	 


      
     </table>
   


</article>


  </div>
</body>
</html>
