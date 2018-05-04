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
    <title>Processing Tokens</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    </script>
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
        <div class="login-box animated fadeInUp"  style="background-color: white;max-width: 500px;">
            <div class="box-header" style="background-color: #80ced6;">
                <h2>Corrent Tokens</h2>
            </div>
                <table border="1px" align="center">
                  <tr>
                    <th>Token No.</th>
                    <th>Name</th>
                    <th>Room No.</th>
                    <th>Doctor Name</th>
                  </tr>
                  <?php
                  $room1 = "select * from queue where status = '1' and room_no='1'";
                  $runr1 = mysqli_query($con,$room1);
                  $data1 = mysqli_fetch_assoc($runr1);
                  $room2 = "select * from queue where status = '1' and room_no='2'";
                  $runr2 = mysqli_query($con,$room2);
                  $data2 = mysqli_fetch_assoc($runr2);
                  $room3 = "select * from queue where status = '1' and room_no='3'";
                  $runr3 = mysqli_query($con,$room3);
                  $data3 = mysqli_fetch_assoc($runr3);
                  $room4 = "select * from queue where status = '1' and room_no='4'";
                  $runr4 = mysqli_query($con,$room4);
                  $data4 = mysqli_fetch_assoc($runr4);
                  $room5 = "select * from queue where status = '1' and room_no='5'";
                  $runr5 = mysqli_query($con,$room5);
                  $data5 = mysqli_fetch_assoc($runr5);
                  ?>
                    <tr>
                      <td><?php echo $data1['token']; ?></td>
                      <td><?php echo $data1['name']; ?></td>
                      <td><?php echo $data1['room_no']; ?></td>
                      <td><?php echo $data1['doctor']; ?></td>
                    </tr>
                    <tr>
                      <td><?php echo $data2['token']; ?></td>
                      <td><?php echo $data2['name']; ?></td>
                      <td><?php echo $data2['room_no']; ?></td>
                      <td><?php echo $data2['doctor']; ?></td>
                    </tr>
                    <tr>
                      <td><?php echo $data3['token']; ?></td>
                      <td><?php echo $data3['name']; ?></td>
                      <td><?php echo $data3['room_no']; ?></td>
                      <td><?php echo $data3['doctor']; ?></td>
                    </tr>
                    <tr>
                      <td><?php echo $data4['token']; ?></td>
                      <td><?php echo $data4['name']; ?></td>
                      <td><?php echo $data4['room_no']; ?></td>
                      <td><?php echo $data4['doctor']; ?></td>
                    </tr>
                    <tr>
                      <td><?php echo $data5['token']; ?></td>
                      <td><?php echo $data5['name']; ?></td>
                      <td><?php echo $data5['room_no']; ?></td>
                      <td><?php echo $data5['doctor']; ?></td>
                    </tr>
                    
                  
                </table>
        </div>
    </div>
</body>
</html>