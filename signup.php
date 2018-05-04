<?php 

	session_start();

	include "lib/database.php"; 

	if(isset($_SESSION['sid']))
	{
		echo "";
	}
	else
	{
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Sign Up</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
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
	<a href="lib/admin/dashboard.php" style="float: left;font-size:15px;margin-left:30px;color: green;"><u>Back to Dashboard</u></a>
	<div class="login-box animated fadeInUp"  style="background-color: #E8F5E9;">
			<div class="box-header" style="background-color:#A5D6A7;">
				<h2 style="color: black;">Add Users</h2>
			</div>
				<form method="post" action="lib/login.php">
					<label for="password">Name</label>
					<br/>
					<input type="text" id="name" name="name">
					<br/>
					<label for="password">Department</label>
					<br/>
					<select id="dept" name="dept" style="height: 35px; width: 190px; margin-bottom: 20px;">
						<option>Select Department Name</option>
						<?php 
							$doc = "select * from department";
							$rundoc = mysqli_query($con,$doc);
							while($fetch = mysqli_fetch_assoc($rundoc))
							{
								?>
								<option><?php echo $fetch['dept']; ?></option>
								<?php
							}
						?>
					</select>
					<br/>
					<label for="password">User Name</label>
					<br/>
					<input type="text" id="username" name="username">
					<br/>
					<label for="password">Password</label>
					<br/>
					<input type="password" id="password" name="password">
					<br/>
					<input type="submit" id="signup" name="signup" value="Add User">
					<br>	
				</form>	
		</div>
	</div>
</body>
</html>