<?php

	include "database.php";

	$dept = $_POST['dept'];
	

	$add = "insert into department (dept) values ('$dept')";
	$run = mysqli_query($con,$add);
	if($run)
	{
		header('location:admin/dashboard.php');
	}
	else
	{
		echo "Error";
	}
?>