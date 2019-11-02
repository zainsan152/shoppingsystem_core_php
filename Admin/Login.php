<!doctype html>
<html>
<?php
require_once('header.php');
?>
<style>


form {border: 3px solid #f1f1f1;}

input[type=email], input[type=password] {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 5%;
}

button:hover {
    opacity: 0.8;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body >

<div class="container" style="text-align:center">
<h2 >Online Gift Shop</h2>

<form method ="Post" action="login_process.php">
 

   <div class="form-group">
   <label for="uname"><b>Username</b></label>
    <input type="email" placeholder="Enter Username" name="email" required>
  
</div>
 <div class="form-group">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
        </div>
    <button class="btn btn-success" type="submit">Login</button>
      <a href="signUp.php" class="btn btn-primary">Signup</a>
   


  
</form>


</div>
</body>
</html>