<?php 

	session_start();

	include "lib/database.php"; 

	if(isset($_SESSION['aid']))
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
	<title>Token Counter</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			$("#b1").click(function(){

				$("#d1").toggle();
			});

		});
	</script>
	
</head>

<body style="background: url(images/token.jpg) no-repeat center center fixed;
    		 background-size: cover;
    		 font-size: 16px;
    		 font-family: 'Lato', sans-serif;
    		 font-weight: 300;
    		 margin: 0;
   			 color: #666;
   			 height: 100%;
   			  background-color:#c7c6bd;
   			 background-blend-mode: screen;">
	
	<div class="container" style="margin-left:-450px;margin-top: -50px;">
		
		<div class="login-box animated fadeInUp" style="background-color: #F5F5F5;">
			<div class="box-header" style="background-color: #b1cbbb">
				<a href="lib/logout.php" style="float: left;font-size: 20px;">Logout</a>
				<h2 style="color: black;">Create Token</h2>
			</div>
				<form method="post" action="lib/generate_token.php">
					<label for="username">Name</label>
					<br/>
					<input type="text" id="name" name="name">
					<br/>
					<label for="password">Mobile No.</label>
					<br/>
					<input type="text" id="mob" name="mob">
					<br/>
					<label for="password">Room No.</label>
					<br/>
					<input type="text"  id="room_no" name="room_no">
					<br/>
					<label for="password">Doctor Name</label>
					<br/>
					<select id="doctor" name="doctor" style="height: 35px; width: 190px; margin-bottom: 20px;">
						<option>Select Doctor Name</option>
						<?php 
							$doc = "select * from doctor";
							$rundoc = mysqli_query($con,$doc);
							while($fetch = mysqli_fetch_assoc($rundoc))
							{
								?>
								<option><?php echo $fetch['doctor_name']; ?></option>
								<?php
							}
						?>
					</select>
					<br/>
					<input type="submit" id="reg" name="reg" value="Submit">
					<br>
					<input type="submit" id="call_next" name="call_next" value="Call_Next">
					<input type="submit" id="reset" name="reset" value="Reset">
					<br/>
				</form>
			<button style="background-color: #b1cbbb;color: black;" id="b1" name="b1">View Pending Request</button>
		</div>
	</div>


	<div class="container" style="margin-left: 450px;margin-top: -590px;">
		
		<div class="login-box animated fadeInUp">
			<div class="box-header" style="background-color: #b1cbbb">
				<h2>Current Token No.</h2>
			</div>
			<table border="1" align="center">
				<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Room No.</th>
					<th>Doctor Name</th>
					<th>Token No.</th>
				</tr>

				<?php
				
				$sel2 = "select * from queue";
				$run3 = mysqli_query($con,$sel2);
				$data1 = mysqli_fetch_assoc($run3);

				if($data1)
				{
					?>
						<tr>
							<td><?php echo $data1['name']; ?></td>
							<td><?php echo $data1['mob']; ?></td>
							<td><?php echo $data1['room_no']; ?></td>
							<td><?php echo $data1['doctor']; ?></td>
							<td><?php echo $data1['token']; ?></td>
						</tr>


				<?php
					}
			
			?>
			</table>
		</div>
	</div> 
	

		<div class="container" style="display: none; margin-left:450px;" id="d1">
		
		<div class="login-box animated fadeInUp">
			<div class="box-header" style="background-color: #b1cbbb">
				<h2>Pending Tokens</h2>
			</div>
			<table border="1" align="center">
					<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Room No.</th>
					<th>Doctor Name</th>
					<th>Token No.</th>
				</tr>

				<?php

				$sel1 = "select * from queue";
				$run2 = mysqli_query($con,$sel1);

				while($data = mysqli_fetch_assoc($run2))
				{
					?>
						<tr>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['mob']; ?></td>
							<td><?php echo $data['room_no']; ?></td>
							<td><?php echo $data['doctor']; ?></td>
							<td><?php echo $data['token']; ?></td>
						</tr>


					<?php
				}
			
			?>
			</table>
		</div>
	</div> 
	
</body>
</html>