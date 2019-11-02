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
<h3 style="margin-top:8%">Add Category</h3>
</header>



<form style="margin-top:8%" method="post" action="product_process.php">
 
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" required>
  </div>

  
   
     
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="row pull-right">
      <a href="product_view.php"><button class="btn btn-success">Back</button></a>
      </div>

</article>


</div>
</body>
</html>
