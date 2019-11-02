<?php
session_start();
if(!isset($_SESSION['user_info']))
{
	header('location:login.php');
	}

?>


<!doctype html>
<html>
<?php require('header.php')?>


<body>
 
<div class="container-fluid">

  <div class="row content">
  <?php require('nav.php') ?>
   

   <div class="col-sm-10">
     
	 <div style="margin:30px;" id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="Sales - ERp/capa_login.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="Sales - ERp/bg02.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="Sales - ERp/ir_attachment_368.jpeg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
     
    
     
      
     
      
       
    </div>
  </div>
</div>





</body>
</html>
