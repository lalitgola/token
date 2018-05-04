	<?php 
    
    session_start();

    include "lib/database.php"; 

    if($_SESSION['st_doc']==false)
    {
         header('location:../../index.php');
    }
    
?>

	<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Patient List</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			$("#vp").click(function(){

				$("#d1").toggle();
			});

		});
	</script>
</head>

<body style="background: url(images/patient.jpg) no-repeat center center fixed;
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
		
		<div class="login-box animated fadeInUp" style="background-color: #eaece5;">
			<div class="box-header" style="background-color: #8ca3a3;">
				<a href="lib/logout.php" style="float: left;font-size: 20px;">Logout</a>
				<h2 style="color: black;">Patient List</h2>
			</div>
			<?php
				include "lib/database.php";

				
					$ids=$_SESSION['dept'];

					   $sqli="select * from doctor where specialist= '$ids'";

					    $q=mysqli_query($con, $sqli) or die(mysqli_error()); //die();
					  $fetch=mysqli_fetch_assoc($q);
					 $p = $fetch['id'];
					//echo $p;
					//die();
				 $sel1 = "select * from queue where room_no = '$p' and  status = 1 limit 1"; //die();
				$run2 = mysqli_query($con,$sel1);
				while($data = mysqli_fetch_assoc($run2))
				{
					?>
			<table border="1" align="center" style="margin-bottom: 30px;">
					<tr>
					<th>Name</th>
					<th>Mobile</th>
					<th>Room No.</th>
					<th>Doctor Name</th>
					<th>Token No.</th>
				</tr>

				

						<tr>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['mob']; ?></td>
							<td><?php echo $data['room_no']; ?></td>
							<td><?php echo $data['doctor']; ?></td>
							<td><?php echo $data['token']; ?></td>
						</tr>


				
			</table>

			<button name="next" id="next"  onclick="add('<?php echo $data['token'];?>')" style="background-color: #1DE9B6;color: black;">Next</button>
			<button name="pending" id="pending"  onclick="pending('<?php echo $data['token'];?>')" style="background-color: #1DE9B6;color: black;">Pending</button>
			<button  id="vp" name="vp" style="background-color: #1DE9B6;color: black;">View_Pending</button>
				<?php
				}
			
			?>
		</div>
	</div> 

<div class="container" style="display: none;" id="d1">
		
		<div class="login-box animated fadeInUp">
			<div class="box-header" style="background-color: #1DE9B6;">
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

				$sel1 = "select * from queue where room_no = '$p'";
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
	
	<script>

  function add(n)

  {
  	
      jQuery.ajax({

       type: "POST",

       url: "lib/update.php",

       data: 'n='+n,

       cache: false,

       success: function(response)

       {
       	window.location.href='display.php';

       }

     });

 }

function pending(n)

  {
  	alert(n);
      jQuery.ajax({

       type: "POST",

       url: "lib/update.php",

       data: 'p='+n,

       cache: false,

       success: function(response)

       {
       	window.location.href='display.php';
       }

     });

 }

</script>

</body>
</html>

