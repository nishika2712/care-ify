<?php
  session_start();
    $user_email = $_GET['email'];
    $user_name = $_GET['name'];
    $user_mobno = $_GET['mobile'];
    $user_time = $_GET['time'];
    $user_date = $_GET['date'];
    $doc_id = $_GET['docid'];
  
    $sql = "SELECT * 
            FROM doctor d1, department d2
            WHERE d1.id = $doc_id
            AND d2.id = d1.specialization";
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
    <title>Confirm your appointment</title>
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
      }
      td {
        border: 2px;
        border-style: groove;
        border-color: var(--green);
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
      }
      input{
        font-size: 15px;
        text-align: center;
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
      .btn {
        padding: 5px 10px;
      }
      .box-container {
        padding-top: 20px;
      }
    </style>
  </head>
  <body>
    <form class="box-container" method="post">
      <div id="table">
      <table>
        <tr>
          <th>Patient's Name</th>
          <td><input type = "text" value = '<?php echo $user_name ?>' name = 'username' readonly></td>
        </tr>
        <tr>
          <th>Mobile Number</th>
          <td><input type = "int" value = '<?php echo $user_mobno ?>' name = 'mobile' readonly></td>
        </tr>
        <tr>
          <th>Doctor's Name</th>
          <td><input type = "text" value = '<?php echo $row['docname'] ?>' name = 'docname' readonly></td>
        </tr>
        <tr>
          <th>Department</th>
          <td><input type = "text" value = '<?php echo $row['specialization'] ?>' name = 'special' readonly></td>
        </tr>
        <tr>
          <th>Date</th>
          <td><input type = "date" value = '<?php echo $user_date ?>' name = 'date' readonly></td>
        </tr>
        <tr>
          <th>Time</th>
          <td><input type = "time" value = '<?php echo $user_time ?>' name = 'time' readonly></td>
        </tr>
      </table>
      </div>
    <input type="submit" value="confirm request" class="btn" name="submit"/>
    <input type="button" value="cancel" class="btn" id="cancel"/>
    </form>
    <script>
      document.getElementById('cancel').addEventListener("click", () =>{
        history.back();
      })
    </script>
    <?php
      if(isset($_POST["submit"]))
      {
        $sql1 ="INSERT INTO appointment(docspecialization, docid,	userid,	userphno, appdate, apptime) 
              VALUES('$row[id]','$doc_id','$user_email','$user_mobno','$_POST[date]','$_POST[time]')";
        $result1 = mysqli_query($con,$sql1);
        if($result1)
        {
          echo "<script>alert('Appointment request recorded successfully!');</script>";
          ?>
            <script>
              location.replace("welcome.php");
            </script>
          <?php
        }
        else
        {
          echo mysqli_error($con);
        }
      }
    ?>
  </body>
</html>
