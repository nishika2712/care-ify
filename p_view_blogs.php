<?php
session_start();
//error_reporting(0);
include "config.php";

$s="SELECT * FROM blogs";
$re = mysqli_query($con, $s);
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
		<title>Blogs</title>
        <style>
    body {
        text-align: center;
      }
      table {
        font-size: 20px;
        border-radius: 20px;
        background-color: var(--green);
        padding: 5px;
        width: 57%;
        margin: 0 auto;
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
        <section class="home" id="home">
            <div class="content">
                <h3 class="heading">All <span>Blogs</span> </h3>
            </div>
        </section>
        <section>
        <form action="" method="post" class="box-container">
                <div class="box">
                
                    <table id="table">
                        <tr>
                            <th>Blogs</th>
                            <th>Date</th>
                            <th>...</th>

                        </tr>
                        
                            <?php
                             while($r = mysqli_fetch_array($re))
                               { 
                                echo "<tr>";
                                echo "<td>" .$r['heading']. "</td>"; 
                                echo "<td>" .date('d-m-Y',strtotime($r['date']))."<br>".date('h:i:s a',strtotime($r['date']))."</td> ";
                                echo "<td><a href='view_blog.php?eid= $r[id]' class='update'>Read</a></td>";
                                echo "</tr>";
                            }   
                            ?>
                              
                       </table> 
                       
                </div>
                </form>
        </section>  
	</body>
</html>