<?php
session_start();
//error_reporting(0);
include "config.php";
$appid = $_GET['appid'];
$m = "SELECT *, r.id as report
      FROM report r, appointment a
      WHERE r.appid = '$appid'";
$n = mysqli_query($con,$m);
$o = mysqli_fetch_array($n);
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
        padding: 20px;
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
        <h3 class="heading">Patient's <span>Report</span></h3>
        
        <form action="" method="post" class="box-container">
        <div id="table">
            <table>
            <?php
                if($o){
                echo "<th>Disease:</th>";
                echo "<td>".$o['disease']."</td>";
                echo "</tr>";
                echo "<th>Prescription:</th>";
                echo "<td>".$o['prescription']."</td>";
                echo "</tr>";
                echo "<th>Visit After:</th>";
                echo "<td>".$o['visit']."</td>";
                echo "</tr>";
                echo "<th>Remarks:</th>";
                echo "<td>".$o['remarks']."</td>";
                echo "</tr>";
                
            ?>
            </table>
            </div>
            <button name="submit" class="btn" type="submit">Edit Report</button>
            <?php
                }
                else{
                    echo "<script>";
                    echo "location.replace('create_report.php?appid=$appid');";
                    echo "</script>";
                   
                }
            ?>
        </form>
       
        
    <?php
        if (isset($_POST['submit']))
        {
            
            echo "<script>";
            echo "location.replace('update_report.php?report=$o[report]');";
            echo "</script>";
        
        }
    ?>
</body>
</html>