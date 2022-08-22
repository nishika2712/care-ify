<?php

session_start();
error_reporting(0);
include "config.php";

$user_email = $_SESSION['loggedin'];
$sql = "SELECT *, a.id AS appid
        FROM appointment a, doctor d, department s, appointmentstatus st
        WHERE a.userid = '{$user_email}'
        AND a.docspecialization = s.id
        AND d.id = a.docid
        AND a.status = st.id
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
        color:red;
        cursor: pointer;
      }
      .heading{
          padding-top:20px;
      }
    </style>
</head>
<body>
<h3 class="heading">My <span>Appointments</span></h3>
    <div class="box-container">
    <div id="table">
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Status</th>
                <th>...</th>
            </tr>
        <?php
        while($row = mysqli_fetch_array($result)){
            if($row['status'] == "processing"){
                echo "<tr style='background-color:#ffffb3;'>";
            }
            elseif($row['status'] == "confirmed"){
                echo "<tr style='background-color:#ccffcc;'>";
            }
            elseif($row['status'] == "declined"){
                echo "<tr style='background-color:#ffc2b3;'>";
            }
            elseif($row['status'] == "completed"){
                echo "<tr style='background-color:#fff;'>";
            }
                echo "<td>".$row['appdate']."</td>";
                echo "<td>".date('h:i a',strtotime($row['apptime']))."</td>";
                echo "<td>".$row['docname']."</td>";
                echo "<td>".$row['specialization']."</td>";
                echo "<td>".$row['status']."</td>";
                if($row['status'] == "processing" || $row['status'] == "confirmed"){
                  echo "<td style='background-color:#fff'><a href='confirmcancellation.php?appid= $row[appid]' class='menu-btn' style='background-color:#fff'>cancel</a></td>";
                }
            echo "</tr>";
        }
        ?>
        </table>
    </div>
    </div>
</body>
</html>