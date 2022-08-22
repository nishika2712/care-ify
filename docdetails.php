<?php
    session_start();
    $id = $_GET['docid'];
    $sql = "SELECT * 
            FROM doctor d1, department d2
            WHERE d1.id = $id
            AND d1.specialization = d2.id";
  include "config.php";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor's details</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
      .book{
        margin-top: 40px;
      }
      img {
        border: 5px;
        border-color: var(--green);
        border-style: groove;
        border-radius: 20px;
      }
      .box{
        display: flex;
        justify-content: space-between;
      }
      span{
        color: var(--green);
      }
      </style>
  </head>
  <body>
    <section class="book" id="book">
      <div class="row">
        <div class="image">
        <?php 
                  echo "<img src='". $row["profile"] . "'/>";
              echo "</div>";

              echo "<form action=''>";
                  echo "<h3>" . $row["docname"] . "</h3>";
                  echo "<div class='box'><span>Qualification:</span> " .$row["qualification"] . "</div>";
                  echo "<div class='box'><span>Specialization:</span> " .$row["specialization"] . "</div>";
                  echo "<div class='box'><span>Contact No.:</span> " .$row["docno"] . "</div>";
                  echo "<div class='box'><span>E-mail:</span> " .$row["docemail"] . "</div>";
                  echo "<div class='box'><span>Available Slot:</span>9:00 AM - 1:00 PM | 2:00 PM - 5:00 PM</div>";
              

             echo "<a href='bookappointment.php?docid=" . $id . "' class='btn'>book now</a>";
          ?>
          
        </form>
      </div>
    </section>
  </body>
</html>
