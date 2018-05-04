<?php
include'database.php';
if($_REQUEST['q'])
{
$var = $_REQUEST['q'] ;
$data=mysqli_fetch_assoc(mysqli_query($con,"select * from doctor WHERE id='$var'"));

	echo  $data['doctor_name'];
}

?>