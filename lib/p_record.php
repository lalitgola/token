<?php 

    session_start();

    include "database.php"; 

    if(isset($_SESSION['sid']))
    {
        echo "";
    }
    else
    {
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Patient Record</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
   
</head>

<body style="background: url(../images/dept.jpg) no-repeat center center fixed;
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
        <a href="admin/dashboard.php" style="float: left;font-size:15px;margin-left:30px;color: green;"><u>Back to Dashboard</u></a> 

        <div class="login-box animated fadeInUp"  style="background-color: white;" id="d1">
      <div class="box-header" style="background-color: #80ced6;">
        <h2>Fill Pateint Details</h2>
      </div>
        <form method="post" action="p_record.php">
          <label for="password">Pateint Name</label>
          <br/>
          <input type="text" id="name" name="name">
          <br/>
          <label for="password">Mobile No.</label>
          <br/>
           <input type="text" id="mob" name="mob">
          <br/>
          <input type="submit" id="s2" name="submit" value="Submit">
          <br>   
        </form> 
    </div>
  </div>

        <div class="login-box animated fadeInUp"  style="background-color: white;max-width: 500px;" id="d2">
            <div class="box-header" style="background-color: #80ced6;">
                <h2>Patient Record</h2>
            </div>
                <table border="1px" align="center">
                  <tr>
                    <th>Date & Time.</th>
                    <th>Token No.</th>
                    <th>Name</th>
                    <th>Room No.</th>
                    <th>Doctor Name</th>
                  </tr>
                  <?php
                  if(isset($_POST['submit']))
                  {
                    $name = $_POST['name'];
                    $mob = $_POST['mob'];
                    $qry = "select * from token_record where name = '$name' and mob = '$mob'";
                    $run = mysqli_query($con,$qry);
                    $row = mysqli_num_rows($run);
                    if($run)
                    {
                     while($data = mysqli_fetch_assoc($run))
                     {
                      ?>
                      <tr>
                         <td><?php echo $data['create_date']; ?></td>
                        <td><?php echo $data['token']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['room_no']; ?></td>
                        <td><?php echo $data['doctor']; ?></td>
                        </tr> 
                    <?php
                      }
                      }
                      else
                      {
                        ?>
                        <script>
                          alert('Record Not Found');
                        </script>
                        <?php
                      }
                    }
                    ?>               
                </table>
        </div>
    </div>
</body>
</html>