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
        font-size: 15px;
        border-radius: 20px;
        background-color: var(--green);
        padding: 5px;
        width: 65%;
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
      .update:hover{
        color:#49fb35;
      }
      .delete:hover{
        color:red;
      }
      .view:hover{
        color:lightblue;
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
                            <th>Heading</th>
                            <th>Date</th>
                            <th>...</th>
                            <th>...</th>
                            <th>...</th>

                        </tr>
                        
                            <?php
                             while($r = mysqli_fetch_array($re))
                               { 
                                echo "<tr>";
                                echo "<td>" .$r['heading']. "</td>"; 
                                echo "<td>" .date('d-m-Y h:i:s a ',strtotime($r['date'])). "</td> ";
                                echo "<td><a href='edit_blog.php?eid= $r[id]' class='update'>Edit</a></td>";
                                echo "<td><a href='delete_blog.php?did= $r[id]' class='delete'>Delete</a></td>";
                                echo "<td><a href='view_blog.php?eid= $r[id]' class='view'>View</a></td>";
                                echo "</tr>";
                            }   
                            ?>
                              
                       </table> 
                       
                </div>
                <button name="submit" class="btn" type="submit">Add More Blogs</button>
                        </form>
        </section> 
        <?php
        if (isset($_POST['submit']))
        {
            ?>
            <script>
                location.replace("add_blog.php");
            </script>
        <?php
        }
    ?>    
	</body>
</html>