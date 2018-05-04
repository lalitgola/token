<?php
include'database.php';
if($_REQUEST['n']){
$var = $_REQUEST['n'] ;
$data=mysqli_query($con,"UPDATE queue SET status=0 WHERE token='$var'");
if($data){
	return $data;
}
}
if($_REQUEST['p']){
$var1 = $_REQUEST['p'] ;
$data=mysqli_query($con,"UPDATE queue SET pending=2 WHERE token='$var1'");
if($data){
	return $data;
}
}
?>