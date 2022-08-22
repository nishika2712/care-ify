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
    <title>Welcome to care-ify!</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>
  <style>
    body {
      opacity: 0.9;
      background: url("images/background1.jpg") no-repeat center center / cover;
    }
    .login .box-container .box{
      width: 65%;
      height: 80%;
      background:none;
      border: none;
      box-shadow: none;
    }
    .login .box-container .box label{
      width: 250px;
    }
    .login .box-container form .box{
      width: 50%;
      margin-bottom: 10px;
      background:#fff;
    }
    .error-msg{
      margin: 0;
      padding: 0;
      color:red;
      position: absolute;
      right: 350px;
      font-size: 10px;
    }
  </style>
  <body>
    <section class="login">
      <div class="box-container">
        <div class="box">
          <form action="" method="post" name="patient" onsubmit="return validateform()">
            <h1 class="heading">Sign Up</h1>

            <label for="name"> <i class="fas fa-user"></i>Name</label>
            <input type="text" class="box" name="name" required/><br>
            <small class="error-msg" id="name-error"></small><br>

            <label for="email"> <i class="fas fa-envelope"></i>E-mail</label>
            <input type="email" class="box" name="email" required/><br>
            <small class="error-msg" id="email-error"></small><br>

            <label for="pass"> <i class="fas fa-lock"></i>password</label>
            <input type="password" class="box" name="pass" minlength = 6 maxlength = 30 required/><br>
            <small class="error-msg" id="pass-error"></small><br>

            <label for="pass"> <i class="fas fa-key"></i>confirm password</label>
            <input type="password" class="box" name="confirm-pass" required/><br>
            <small class="error-msg" id="cpass-error"></small><br>

            <label for="pno"> <i class="fas fa-phone"></i>Phone number</label>
            <input type="number" class="box" name="pno" required/><br>
            <small class="error-msg" id="phone-error"></small><br>

            <label for="gender"> <i class="fas fa-user"></i>Gender</label>
   
            <select name="gender" class="box" required>
              <option value="">--Select Your Gender--</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select><br>

            <label for="dob"><i class="fa fa-calendar"></i>DOB</label>
            <input type="date" class="box" id="dob" name="dob" required/><br>
            <small class="error-msg" id="dob-error"></small><br>

            <p>Already registered? <a href="login.php">Log In</a></p>

            <button name="submit" class="btn" type="submit">Register</button>
          </form>
        </div>
      </div>
    </section>

<?php

if (isset($_POST['submit'])) 
{
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['pass']);
  $password=md5($password);
  $confirm_password = mysqli_real_escape_string($con, $_POST['confirm-pass']);
  $confirm_password=md5($confirm_password);
  $pno = mysqli_real_escape_string($con, $_POST['pno']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $dob = mysqli_real_escape_string($con, $_POST['dob']);

  if($email == 'admin@gmail.com' 
  || mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE email='{$email}'")) > 0
  || mysqli_num_rows(mysqli_query($con, "SELECT * FROM doctor WHERE docemail='{$email}'")) > 0)
  {
    echo "<script>
    alert('Email Id already registered.');
    </script>";
  }
  else
  {
      if ($password === $confirm_password) 
      {
          $sql = "INSERT INTO user (name, email, password, phno, gender, dob) VALUES ('{$name}', '{$email}', '{$password}', '{$pno}', '{$gender}', '{$dob}')";
          $result = mysqli_query($con, $sql);    
          if($result)
          {  
            echo "<script> alert('Successfully Registered. You can log in now'); </script>";
            ?>
              <script>
                location.replace("login.php");
              </script>
            <?php
          }     
      } 
      else 
      {
        echo "<script> alert('Password and Confirm Password do not match'); </script>";
      }
  }
}
?>

<script>

var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var emailExpression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

function validateform()
{
    var flag = 0;
    if (!document.patient.name.value.match(alphaspaceExp)) 
    {
      document.getElementById("name-error").innerText = "Enter a valid name.";
      document.patient.name.focus();
      flag = 1;
    }
    else{
      document.getElementById("name-error").innerText = "";
    }

    if(!document.patient.email.value.match(emailExpression))
    {
      document.getElementById("email-error").innerText = "Enter a valid email address.";
      document.patient.email.focus();
      flag = 1;
    }
    else{
      document.getElementById("email-error").innerText = "";
    }
    
    if (!document.patient.pno.value.match(numericExpression) 
    || document.patient.pno.value.length < 10) 
    {
      document.getElementById("phone-error").innerText = "Enter a valid phone number.";
      document.patient.pno.focus();
      flag = 1;
    } 
    else{
      document.getElementById("phone-error").innerText = "";
    }

    if(flag){
      return false;
    }
    else{
      return true;
    }
}

      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear() - 18;

      if (dd < 10) {
        dd = '0' + dd
      }

      if (mm < 10) {
        mm = '0' + mm
      }

      today = yyyy + '-' + mm + '-' + dd;
      document.getElementById('dob').setAttribute("max", today);
   
</script>
  </body>
</html>