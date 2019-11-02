<?php

    include('db_connection.php');



        $category_Id=$_POST['category_Id'];
        $brand_Id=$_POST['brand_Id'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $Quantity=$_POST['Quantity'];
        $code=$_POST['code'];
        $cost_price=$_POST['cost_price'];
        $checke=$_POST['check'];
        $file=$_FILES['pic']['name'];
        $file_tmp=$_FILES['pic']['tmp_name'];
        $path="images/".$file;
        $detail=getimagesize($file_tmp);
        $exte=basename($detail['mime']);
        $ext=strtolower($exte);

        if($ext=='jpeg' ||$ext=='jpg'||$ext=='png'||$ext=='gif')
        {
            move_uploaded_file($file_tmp,$path);
            $query="INSERT INTO tblproduct values('','$name','$code','$path','$price','$Quantity','$checke','$category_Id','$brand_Id','$cost_price')";

            if (mysqli_query($db_connection,$query))
            {
                header('location:item_view.php');
                echo "<h2>Data Saved</h2>";
            }
            else
            {
                echo "Error in query = ".mysqli_error($db_connection);
            }



    }

    ?>

