<?PHP

//Data from DB
include("db_connection_2.php");



// View query execution
//$show_data = (mysqli_query($db_connection, $view_data));

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["psw"]) ? $_POST["psw"] : "";

$query = "select * from customer where email = '$email' and password = '$password'";
//$data=mysqli_query($db_connection ,$query);
//$total=mysqli_num_rows($data);
if($result = mysqli_query($db_connection, $query))
{
    $rowcount = mysqli_num_rows($result);

    if($rowcount > 0)
    {
        $result=mysqli_fetch_assoc($result);
        session_start();
        //echo $result['customerId'];
        $_SESSION['user_info'] = $result['customerId'];
      //  echo $_SESSION['user_info'];
        header("Location: ../product.php ");
    }
    else
    {
        header( 'Location: ../register.php' ) ;
    }
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($db_connection);
?>


