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
            <h3 style="margin-top:5%">Sale Order</h3>
        </header>


        <form style="margin-top:8%" method="post" action="addItem.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="sel1">Select Category:</label>
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
                    //  $brand = mysqli_query($db_connection, "SELECT * FROM brand WHERE category_Id = ");
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sel1">Select Brand:</label>
                <select name="brand_Id" class="form-control" id="sel1" required>
                    <?php

                    $tempId ;
                    include("db_connection.php");
                    $sql = mysqli_query($db_connection, "SELECT * FROM brand");
                    echo"<option >Select Category</option>";
                    while ($row = $sql->fetch_assoc()){
                        // $tempId = $row['category_Id'];
                        echo "<option value=".$row['brand_Id'].">" .$row['name']. "</option>";
                        // echo "<option value=".$tempId.">" . $row['name'] . "</option>";
                        //$tempId = $row['category_Id'] ;
                        // echo  $tempId;
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Price:</label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="form-group">
                <label for="name">Quantity:</label>
                <input type="number" class="form-control" name="Quantity" required>
            </div>
            <div class="form-group">
                <label for="name">code:</label>
                <input type="text" class="form-control" name="code" required>
            </div>
            <div class="form-group">
                <label for="name">Cost Price:</label>
                <input type="number" class="form-control" name="cost_price" required>
            </div>
            <div class="form-group">
                <label for="name" >Featured:</label>
                <input type="Checkbox" value="true"  name="check">
            </div>
            <div class="form-group">
                <label for="name">image:</label>
                <input type="file" name="pic">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </article>


</div>
</body>
</html>
