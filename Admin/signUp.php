 <html>
<?php
require_once('header.php');
?>
<style>
.form-group{
	width:50%;
}
</style>

    
  <div class="col-sm-9">


<h4 style="margin-top:5%">Registretion</h4>
<form  method="post" action="signUp_process.php">
 
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name"required>
  </div>
    <div class="form-group">
    <label for="name">Email:</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  
    <div class="form-group">
    <label for="name">Password:</label>
    <input type="password" class="form-control" name="password"required>
  </div>
  
   
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>





</div>
</body>
</html>
