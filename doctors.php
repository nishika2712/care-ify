<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Check out our expert doctors.</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
    #doctors{
        height: 130vh;
    }
    .box-container{
        padding-top: 30px;
    }
    .box-container select {
        font-size: 20px;
    }
    .special{
        font-size: 15px;
    }
    .special:hover{
        font-size: 20px;
    }
    .doctor-menu{
        display: block;
    }
    .doctor-menu: hover{
        display: block;
    }
    ul{
        list-style-type: none;
    }
    li{
        font-size:10px;
    }
    li:hover{
        font-size:15px;
    }
    </style>
  </head>
  <body>
    <section class="doctors" id="doctors" onclick="closeSidebar()">
      <h1 class="heading">our <span>doctors</span></h1>
      <?php
        $sql = "SELECT * from department";
        $result = mysqli_query($con,$sql);

         echo "<div class='box-container'>";

        while($row = mysqli_fetch_array($result)){
            $sql_query = "SELECT DISTINCT d.id, docname 
                            FROM doctor d, department
                            WHERE d.specialization =" . $row["id"];
            $doctors = mysqli_query($con,$sql_query);

            echo "<div class='box special'>";
            echo  $row["specialization"];
            

            echo "<ul class = 'doctor-menu'>";
            while($doc = mysqli_fetch_array($doctors)){
                echo "<li> <a href='docdetails.php?docid= $doc[id]'>" . $doc["docname"]
                ."</a></li>";
            }
            echo "</ul>";
            echo "</div>";
        }
         echo "</div>";
        
      ?>

    </section>
    <script src="/js/script.js"></script>
  </body>
</html>
