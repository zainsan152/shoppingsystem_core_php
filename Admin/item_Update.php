<?php

include("db_connection.php");


$companyname=$_POST['cn'];
	$address=$_POST['addre'];
	$city=$_POST['cty'];
	$region=$_POST['rg'];
	$postelcode=$_POST['pc'];
	$country=$_POST['cntry'];
	$phone=$_POST['phn'];
	$fax=$_POST['fx'];
	$query= "UPDATE customers SET  companyname ='$companyname', Address='$address', City='$city', Region='$region', PostelCode='$postelcode', Country='$country', Phone='$phone', Fax='$fax' WHERE customerID ='$customerid' ";
	$data=mysqli_query($conn ,$query);
	if($data)
	{
		echo "Record update successfully. <a href='view.php'>check updated list here </a>";
	}
	else
	{
		echo "Record not update";
	}
	
?>