<?php

	include "database.php";

	$doctor_name = $_POST['doctor_name'];
	$specialist = $_POST['specialist'];

	$add = "insert into doctor (doctor_name,specialist) values ('$doctor_name','$specialist')";
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