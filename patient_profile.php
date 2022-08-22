<?php
session_start();
error_reporting(0);
include "config.php";

$user_email = $_SESSION['loggedin'];
$sql = "SELECT * FROM user WHERE email = '{$user_email}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>care-ify</title>

    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <style>
        body {
        text-align: center;
      }
      table {
        font-size: 20px;
        border-radius: 20px;
        background-color: var(--green);
        padding: 5px;
      }
      td {
        border: 2px;
        border-style: groove;
        border-color: var(--green);
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
      }
      th {
        text-align: left;
        border: 2px;
        border-style: groove;
        border-color: var(--green);
        padding: 20px;
        color: var(--black);
        border-radius: 10px;
        background-color: #fff;
      }
      #table{
        display:flex;
        justify-content:center;
        align-items:center;
      }
      .btn {
        padding: 5px 10px;
        margin-bottom: 20px; 
      }
      .box-container {
        padding-top: 20px;
      }
    </style>
</head>
<body>
        <h3 class="heading">Patient's <span>Details</span></h3>
        
        <form action="" method="post" class="box-container">
        <div id="table">
            <table>
            <?php
                echo "<tr>"; 
                echo "<th>name:</th>";                    
                echo "<td>".$row['name']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>email:</th>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>contact no:</th>";
                echo "<td>".$row['phno']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Gender:</th>";
                echo "<td>".$row['gender']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>DOB:</th>";
                echo "<td>".$row['dob']."</td>";
                echo "</tr>";
            ?>
            </table>
            </div>
            <button name="submit" class="btn" type="submit">Edit Details</button>
            
        </form>
       
        
    <?php
        if (isset($_POST['submit']))
        {
            ?>
            <script>
              location.replace("update_pdetails.php");
            </script>
            <?php
        }
    ?>
</body>
</html>