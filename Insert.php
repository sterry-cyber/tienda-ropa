<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Name=$_POST['txtName'];
	$Address=$_POST['txtAddress'];
	$City=$_POST['cmbCity'];
	
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	$Gender=$_POST['rdGender'];
	$BirthDate=$_POST['txtDate'];
	
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];
	
	
	
	

	$con = mysqli_connect ("localhost","root", "2012116664", "shopping");

	$sql = "insert into customer_registration(CustomerName,Address,City,Email,Mobile,Gender,BirthDate,UserName,Password) values('".$Name."','".$Address."','".$City."','".$Email."',".$Mobile.",'".$Gender."','".$BirthDate."','".$UserName."','".$Password."')";

	mysqli_query ($con, $sql);

	mysqli_close ($con);
	
	echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';

?>
</body>
</html>
