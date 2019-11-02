<?PHP

//Data from DB
include("db_connection.php");



// View query execution
//$show_data = (mysqli_query($db_connection, $view_data));

$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["psw"]) ? $_POST["psw"] : "";

$query = "select * from users where email = '$email' and password = '$password'";

if($result = mysqli_query($db_connection, $query))
{
	  $rowcount = mysqli_num_rows($result);
	  if($rowcount > 0)
	  {
		  session_start();
		  $_SESSION['user_info'] = $_POST["email"];
		    header( 'Location: index.php' ) ;
	  }
	  else
	  {
		  header( 'Location: login.php' ) ;
	  }  
}
else
{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>


