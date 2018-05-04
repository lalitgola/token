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
    <title>Add Department</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    </script>
</head>

<body style="background: url(images/dept.jpg) no-repeat center center fixed;
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
        <div class="login-box animated fadeInUp"  style="background-color: white;">
            <div class="box-header" style="background-color: #80ced6;">
                <h2>Add Department</h2>
            </div>
                <form method="post" action="lib/add_dept.php">
                    <label for="password">Department Name</label>
                    <br/>
                    <input type="text" id="dept" name="dept">
                    <br/>
                    <input type="submit" id="add" name="add" value="Add Dept.">
                    <br>    
                </form> 
        </div>
    </div>
</body>
</html>