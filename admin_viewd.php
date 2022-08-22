<?php

session_start();
error_reporting(0);
include "config.php";

//$user_mail = $_SESSION['login'];
$sql = "SELECT * from doctor";
$result = mysqli_query($con, $sql);

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
            margin-top: auto;
            text-align: center;
        }
    
        .sub-heading
        {
            text-align: center;
            color: var(--green);
            font-size: 2rem;
            padding-top: 1rem;
            padding-bottom: 2rem;
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
    .email{
    text-transform:none;
    }
    </style>        
	</head>
	<body>
        <section class="home" id="home">
            <div class="content">
                <h3 class="heading">list of <span>DOCTORS</span></h3>
            </div>
        </section>
        <section class="list" id="list">
                <div class="box-container">
                        
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td width="10%"><strong>ID </strong></td>
                                        <td width="10%"><strong>specialization</strong></td>
                                        <td width="10%"><strong>doctor's name </strong></td>
                                        <td width="10%"><strong>contact number</strong></td>
                                        <td width="12%"><strong>email</strong></td>
                
                                        <td width="10%"><strong>qualification</strong></td>
                                    </tr>
                            
                            <?php
                             while($r = mysqli_fetch_array($result))
                               {    $s = "SELECT * FROM department where id='{$r['specialization']}'";
                                    $res = mysqli_query($con, $s);
                                    $d = mysqli_fetch_array($res);
                                   echo "<tr>";
                                   echo "<td>" .$r['id']. "</td>";
                                   echo "<td>" .$d['specialization']. "</td>";
                                   echo "<td>" .$r['docname']. "</td>"; 
                                   echo "<td>" .$r['docno']. "</td> ";
                                   echo "<td class='email'>" .$r['docemail']. "</td> ";
            
                                   echo "<td>" .$r['qualification']. "</td> ";
                                ?>
                              
                            </tr> 
                            <?php
                            } 
                            ?>
                                </tbody>
                        </table> 
                </div>
        </section>
	</body>
</html>