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
      <h3 style="margin-top:5%">Add Customer</h3>
      </header>
     
   
<form  style="margin-top:8%" method="post" action="customer_process.php">
 
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" required>
  </div>
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  
    <div class="form-group">
    <label for="name">phone No:</label>
    <input type="text" class="form-control" name="phone" required>
  </div>
   <div class="form-group">
    <label for="name">Address:</label>
    <input type="text" class="form-control" name="address" required>
  </div>
   <div class="form-group">
    <label for="name">State:</label>
    <input type="text" class="form-control" name="state" required>
  </div>
   <div class="form-group">
    <label for="name">City:</label>
    <input type="text" class="form-control" name="City"required>
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
<div  class="row pull-right">
      <a href="customer_view.php"><button class="btn btn-success">Back</button></a>
      </div>
</article>


  </div>
</body>
</html>
