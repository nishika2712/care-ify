<?php
session_start();
$sql_time = "SELECT * FROM timeslot";
include "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Select the time slot</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="book" id="book">

      <div class="row">
        <div class="image">
          <img src="images/online_consultation.png" alt="" class="floating" />
        </div>
        <form action="confirmbooking.php" method="get">
          <h3>book appointment</h3>
          <?php 
            $time = mysqli_query($con, $sql_time);
          ?>
          <input type="text" value="<?php echo $_GET['name'] ?>" class="box" name = "name" readonly/>
          <input type="text" value="<?php echo $_GET['email'] ?>" class="box" name = "email" readonly/>
          <input type="number" value="<?php echo $_GET['mobile'] ?>" class="box" name = "mobile" readonly/>
          <input type="hidden" value="<?php echo $_GET['docid'] ?>" name = "docid" />
          <input type="text" value="<?php echo $_GET['docname']?>" class="box" name = "docname" readonly>
          <input type="date" value="<?php echo $_GET['date']?>" class="box" name = "date" id="date" readonly/>
          <select name="time" id="slot" class="box" required>
            <option value="">--Select a time slot--</option>
    
          <?php
            while($timeslot = mysqli_fetch_array($time)) {
              $sql_avail = "SELECT count(*) AS booked
                          FROM appointment
                          WHERE docid = $_GET[docid]
                          AND appdate = '$_GET[date]'
                          AND apptime = '$timeslot[start_time]'";
              $avail = mysqli_query($con, $sql_avail);
              $bookedapp = mysqli_fetch_array($avail);
              echo "<script> console.log('it works') </script>";
              if($bookedapp[booked] == 0)
              echo "<option type='time' value='" .$timeslot['start_time']. "'>" . date('h:i a', strtotime($timeslot['start_time'])) ."-". date('h:i a', strtotime($timeslot['end_time'])). "</option>";
          }
            ?>
          </select>
          <input type="submit" value="book now" class="btn" />
          <input type="button" value="change date" class="btn" id="cancel" />
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

      document.getElementById('cancel').addEventListener("click", () =>{
        history.back();
      })
    </script>
  </body>
</html>
