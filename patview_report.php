<?php
session_start();
error_reporting(0);
include "config.php";

$report = $_GET['report'];
$x="SELECT * 
    FROM report r, appointment a, doctor d, department s
    WHERE r.id='$report'
    AND r.appid = a.id
    AND a.docid = d.id
    AND d.specialization = s.id";
$y=mysqli_query($con,$x);
$z=mysqli_fetch_array($y);

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
        margin: 20px;
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
        <h3 class="heading">My <span>Report</span></h3>
        
        <div class="box-container">
        <div id="table">
            <table>
            <?php
                echo "<tr>";
                echo "<th>Doctor's Name:</th>";
                echo "<td>".$z['docname']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Department:</th>";
                echo "<td>".$z['specialization']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Diagnosis:</th>";
                echo "<td>".$z['disease']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Prescription:</th>";
                echo "<td>".$z['prescription']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Visit After:</th>";
                echo "<td>".$z['visit']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Remarks:</th>";
                echo "<td>".$z['remarks']."</td>";
                echo "</tr>";
            ?>
            </table>
            </div>
        </form>
</body>
</html>