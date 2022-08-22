<?php

session_start();
error_reporting(0);
include "config.php";

$user_email = $_SESSION['loggedin'];
$sql = "SELECT *, a.id AS appid
        FROM appointment a, doctor d, department s
        WHERE a.userid = '{$user_email}'
        AND a.docspecialization = s.id
        AND d.id = a.docid
        AND a.status = 4
        ORDER BY a.appdate DESC";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Appointments</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
        text-align: center;
      }
      table {
        font-size: 20px;
        border-radius: 20px;
        background-color: var(--green);
        padding: 5px;
        margin: 10px;
      }
      td {
        border: 2px;
        border-style: groove;
        border-color: var(--green);
        padding: 20px;
        border-radius: 10px;
        background-color:#fff;
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
      .box-container {
        padding-top: 10px;
      }
      .menu-btn:hover{
        color: #49fb35;
        cursor: pointer;
      }
      .heading{
          padding-top:20px;
      }
    </style>
</head>
<body>
<h3 class="heading">My <span>Reports</span></h3>
    <div class="box-container">
    <div id="table">
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Report</th>
            </tr>
        <?php
        while($row = mysqli_fetch_array($result)){
            $m = "SELECT *
                    FROM report r
                    WHERE r.appid = '$row[appid]'";
            $res = mysqli_query($con, $m);
            $r = mysqli_fetch_array($res);
            
            echo "<tr>";
            echo "<td>".$row['appdate']."</td>";
            echo "<td>".date('h:i a',strtotime($row['apptime']))."</td>";
            echo "<td>".$row['docname']."</td>";
            echo "<td>".$row['specialization']."</td>";
            if($r){
                echo "<td><a href='patview_report.php?report= $r[id]' class='menu-btn' style='background-color:#fff'>view</a></td>";
            }
            echo "</tr>";
        }
        ?>
        </table>
    </div>
    </div>
</body>
</html>