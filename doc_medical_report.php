<?php

session_start();
error_reporting(0);
include "config.php";

$user_mail = $_SESSION['login'];
$sql = "SELECT *, a.id AS appid
        FROM appointment a, doctor d 
        WHERE d.docemail = '{$user_mail}' 
        AND d.id =a.docid
        AND a.status = 4
        ORDER BY a.status, a.appdate, a.apptime";
$result = mysqli_query($con,$sql);

?> 

<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>care-ify</title>

        <!-- font awesome cdn link  -->
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        />

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css" />
        <style>
            .home .content
            {
                text-align: center;
            }

        table {
            margin: 0 auto;
            font-size: large;
            border: 2px;
            border-style: groove;
            border-color: var(--green);
            background-color: var(--green);
            border-radius: 15px;
            text-align: center;
        }
        td {
            border-style: groove;
            border-color: var(--green);
            padding: 10px;
            border-radius: 10px;
            background-color: #fff;
        }
  
        th{
            border: 2px;
            border-style: groove;
            border-color: var(--green);
            padding: 10px 20px;
            color: var(--black);
            border-radius: 10px;
            background-color: #fff;
        }
        a{
            color: var(--black);
        }
        .accept:hover{
            color: #49fb35;
        }
        .decline:hover{
            color: red;
        }
        </style>   
	</head>
	<body>
        <section class="home" id="home">
            <div class="content">
                <h3 class="heading">Medical <span>reports</span> </h3>
            </div>
        </section>
        <section>
                <div class="box-container">
                    <table class="box">
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Name</th>
                            <th>...</th>

                        </tr>
                        
                            <?php
                             while($r = mysqli_fetch_array($result))
                               { 
                                echo "<tr>";
                                $sql1 = "SELECT * from user where email= '{$r['userid']}' ";
                                $res = mysqli_query($con,$sql1);
                                $row = mysqli_fetch_array($res);
                                
                                    echo "<td>" .$r['appdate']. "</td>";
                                    echo "<td>" .date('h:i a',strtotime($r['apptime'])). "</td>";
                                    echo "<td>" .$row['name']. "</td>"; 
                                    echo "<td><a href='doc_view_reports.php?appid= $r[appid]' class='accept'>report</a></td>";
                                
                                echo "</tr>";
                            }   
                            ?>
                              
                       </table> 
                </div>
        </section>     
	</body>
</html>