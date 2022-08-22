<?php
session_start();
$user_email = $_SESSION['loggedin'];
$sql = "SELECT * FROM user WHERE email = '{$user_email}'";
$sql_time = "SELECT * FROM timeslot";
$sql_doc = "SELECT * FROM doctor WHERE id = $_GET[docid]";
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Appointments with our expert doctors.</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="book" id="book">

      <div class="row">
        <div class="image">
          <img src="images/online_consultation.png" alt="" class="floating" />
        </div>
        <form action="selectappdate.php" method="get">
          <h3>book appointment</h3>
          <?php 
            $result = mysqli_query($con, $sql);
            $result_doc = mysqli_query($con,$sql_doc);
            $row = mysqli_fetch_array($result);
            $doc = mysqli_fetch_array($result_doc);
            $time = mysqli_query($con, $sql_time);
          ?>
          <input type="text" value="<?php echo $row['name'] ?>" class="box" name = "name" readonly/>
          <input type="text" value="<?php echo $user_email ?>" class="box" name = "email" readonly/>
          <input type="number" value="<?php echo $row['phno'] ?>" class="box" name = "mobile" readonly/>
          <input type="hidden" value="<?php echo $_GET['docid'] ?>" name = "docid" />
          <input type="text" value="<?php echo $doc['docname']?>" class="box" name = "docname" readonly>
          <input type="date" class="box" name = "date" id="date" required/>
          <input type="submit" value="Select Slot" class="btn" />
        </form>
      </div>
    </section>
    <script>
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = '0' + dd
      }

      if (mm < 10) {
        mm = '0' + mm
      }

      today = yyyy + '-' + mm + '-' + dd;
      document.getElementById('date').setAttribute("min", today);
    </script>
  </body>
</html>
