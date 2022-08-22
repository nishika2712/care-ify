<?php

session_start();
error_reporting(0);
include "config.php";

$user_mail = $_SESSION['login'];
$sql = "SELECT DISTINCT(u.email) AS userid
        FROM appointment a, doctor d, user u 
        WHERE d.docemail = '{$user_mail}' 
        AND d.id =a.docid
        AND a.userid = u.email
        AND a.status != 2";
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
            font-size: 15px;
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
        a:hover{
            color: darkblue;
        }
        </style>   
	</head>
	<body>
        <section class="home" id="home">
            <div class="content">
                <h3 class="heading"> list of <span>patients</span> </h3>
            </div>
        </section>
        <section>
                <div class="box-container">
                    <table class="box">
                        <tr>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Gender</th>
                            <th>Contact Number</th>
                            <th>Date Of Birth</th>
                        </tr>
                        
                            <?php
                             while($r = mysqli_fetch_array($result))
                               { 
                                echo "<tr>";
                                $sql1 = "SELECT *
                                        FROM user 
                                        WHERE email= '{$r['userid']}'
                                        ORDER BY id";
                                $res = mysqli_query($con,$sql1);
                                $row = mysqli_fetch_array($res);
                                
                                    echo "<td>" .$row['name']. "</td>";
                                    echo "<td>" .$row['email']. "</td>"; 
                                    echo "<td>" .$row['gender']. "</td> ";
                                    echo "<td>" .$row['phno']. "</td> ";
                                    echo "<td>" .$row['dob']. "</td> ";
                                
                                echo "</tr>";
                            }   
                            ?>
                              
                       </table> 
                </div>
        </section>     
	</body>
</html>