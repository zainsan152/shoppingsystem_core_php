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
            <h3 style="margin-top:5%">Brand</h3>
        </header>


        <form style="margin-top:8%" method="post" action="brand_process.php">

            <div class="form-group">
                <label for="name">Select Category:</label>
                <select name="category_Id" class="form-control" id="sel1" required>
                    <?php

                    $tempId ;
                    include("db_connection.php");
                    $sql = mysqli_query($db_connection, "SELECT * FROM category");
                    echo"<option >Select Category</option>";
                    while ($row = $sql->fetch_assoc()){
                       // $tempId = $row['category_Id'];
                        echo "<option value=".$row['category_Id'].">" .$row['name']. "</option>";
                       // echo "<option value=".$tempId.">" . $row['name'] . "</option>";
                        //$tempId = $row['category_Id'] ;
                       // echo  $tempId;
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>





            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </article>

</div>
</body>
</html>
