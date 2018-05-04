<?php

	$con = mysqli_connect("localhost","root","","token");

	if($con)
	{
		echo "";
	}
	else
	{
		echo "Not Connected";
	}

?>