<?php
	session_start();

include "database.php";

	if(isset($_POST['signup']))
	{
		$name = $_POST['name'];
		$dept = $_POST['dept'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$match = "select * from users where username = '$username' ";
		$run1 = mysqli_query($con,$match);
		$check = mysqli_num_rows($run1);
		if($check == 1)
		{
			?>
				<script>
					alert('Username is already exist');
					window.open("../index.php","_self");
				</script>
			<?php
		}
		else
		{
			$insert = "insert into users (name,dept,username,password) values ('$name','$dept','$username','$password') ";
			$run = mysqli_query($con,$insert);
			if($run)
			{
				?>
					<script>
						alert('Successfully SignUp');
						window.open("../index.php","_self");
					</script>
				<?php

			}
			else
			{
				echo "Error";
			}
		}
	}

	if(isset($_POST['login']))
	{


		$username = $_POST['username'];
		$password = $_POST['password'];

		$doctor = "select * from users where dept = '$username' and password = '$password'";
		$rundoc = mysqli_query($con,$doctor);
		 $doc = mysqli_num_rows($rundoc);
		//die();
		if($username == 'admin' && $password == 'admin')
		{
			$qry1 ="select * from users";
         	$runqry1 = mysqli_query($con,$qry1);
           	$data1 = mysqli_fetch_assoc($runqry1);
            $id = $data1['id'];
        
           	$_SESSION['sid'] = $id;
           	$_SESSION['st_admin'] = true;
			header('location:admin/dashboard.php');

		}
		elseif($doc == 1)
		{
			$data123=mysqli_fetch_assoc($rundoc);
			
              $id = $data123['id'];
              $name=$data123['dept'];
        	
           	$_SESSION['did'] = $id;
           	$_SESSION['st_doc'] = true;
           	 $_SESSION['dept'] = $name;

			header('location:../display.php');
		}
		else
		{
			$login = "select * from users where username = '$username' and password = '$password' ";
			$runlog = mysqli_query($con,$login);
			$check1 = mysqli_num_rows($runlog);

        	if($check1==1)
         	{
         		$qry ="select * from users";
         		$runqry = mysqli_query($con,$qry);
           		$data = mysqli_fetch_assoc($runqry);
            	$id = $data['id'];
        
           	 	$_SESSION['aid'] = $id;

            	header('location:../create_token.php');
          	}
        	else
          	{
            	header('location:../index.php');
          	}
      	}
      
	}


?>