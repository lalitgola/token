<?php
	
	session_start();

	include "lib/database.php";

	if(isset($_SESSION['aid']))
	{
		header('location:create_token.php');
	}
	if(isset($_SESSION['st_admin']))
	{
		header('location:lib/admin/dashboard.php');
	}
	if(isset($_SESSION['st_doc']))
	{
		header('location:display.php');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
	$(document).ready(function()
	{
  			$("form[name='frm']").validate({
    		rules: {
     					username: {
        						required: true,
        						email: true
     							},
					    password: {
					        required: true,
					        minlength: 5
      							   }
    				},
   			messages: {
     					username: {
        							required: "Please provide a password",
       								minlength: "Your password must be at least 5 characters long"
      				 				},
      					password: {
        							required: "Please Enter your Email Id",
        							email: "Please Enter The Valid Email"
     								}
    				  },
    		submitHandler: function(form)
    			{
    				alert('hi');
      			form.submit();
    			}
  			});
		});
	
</script>

</head>

<body style="background: url(images/login.jpg) no-repeat center center fixed;
    		 background-size: cover;
    		 font-size: 16px;
    		 font-family: 'Lato', sans-serif;
    		 font-weight: 300;
    		 margin: 0;
   			 color: #666;
   			 height: 100%;
   			 background-color:#c7c6bd;
   			 background-blend-mode: screen;">
	
	<div class="container">
		
		<div class="login-box animated fadeInUp"  style="background-color:  #E8F5E9;">
			<div class="box-header" style="background-color:#A5D6A7;">
				<h2 style="color: black;">Login</h2>
			</div>
				<form method="post" name="frm" action="lib/login.php">
					<label for="password">User Name</label>
					<br/>
					<input type="text" id="username" name="username">
					<br/>
					<label for="password">Password</label>
					<br/>
					<input type="password" id="password" name="password">
					<br/>
					<input type="submit" id="login" name="login" value="Login">
					<br>
				</form>	
		</div>
	</div>

</body>
</html>