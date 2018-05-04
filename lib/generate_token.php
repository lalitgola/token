<?php

include "database.php";

		// Generate Token

if(isset($_POST['reg']))
		{


		$name = $_POST['name'];
		$mob = $_POST['mob'];
		$room_no = $_POST['room_no'];
		$doctor = $_POST['doctor'];

			//All RECORD

			$insert1 = "insert into token_record (name,mob,room_no,doctor) values ('$name','$mob','$room_no','$doctor')";
			$run2 = mysqli_query($con,$insert1);

			//Every day record

			$insert = "insert into queue (name,mob,room_no,doctor) values ('$name','$mob','$room_no','$doctor')";
			$run = mysqli_query($con,$insert);
			$sel = "select * from queue";
			$run1 = mysqli_query($con,$sel);
			$check = mysqli_num_rows($run1);
		

			if($run)
			{
				?>
					<script>
						alert("Your Token No. is <?php echo $check; ?>");
						window.open("../create_token.php","_self");
					</script>
				<?php
			}
			else
			{
				echo "error";

			}
		}


			// Reset Queue Avery Day

		if(isset($_POST['reset']))
		{
			$del = "truncate queue";
			$qry = mysqli_query($con,$del);
			header('location:../create_token.php');
			
		}


		// Call Next Person

		if(isset($_POST['call_next']))
		{

			$query = "select * from queue";
			$runqry = mysqli_query($con,$query);
			$data2 = mysqli_fetch_assoc($runqry);
			$token = $data2['token'];
			$delete = "delete from queue where token = $token";
			$runss = mysqli_query($con,$delete);
			header('location:../create_token.php');
			
		

		}
	?>



