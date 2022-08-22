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
    <title>Welcome back to care-ify!</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

  </head>
  <style>
    body {
      height: 100vh;
      padding: 20px;
      opacity: 0.9;
      background: url("images/background1.jpg") no-repeat center center / cover;
    }
    .login .box-container {
      height: 90vh;
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
    input .box {
      width: 10px;
    }
  </style>
  <body>
    <section class="login">
      <div class="box-container">
        <div class="box">
          <form action="" method="post">
            <h1 class="heading">Log In</h1>

            <label for="email"> <i class="fas fa-user"></i>E-mail</label>
            <input type="email" class="box" name="email" required/>
            
            <br />

            <label for="password"> <i class="fas fa-key"></i>password</label>
            <input type="password" class="box" name="password" required/>

            <p><a href="forgot_pass.php" style="margin-bottom: 15px; display: block; text-align: right;">Forgot Password?</a></p> 

            <p>Haven't registered yet? <a href="signup.php">Sign Up</a></p>

            <button name="submit" name="submit" class="btn" type="submit">Login</button>

            <!-- <p>Login as an admin - <a href="admin_log.php">Login Admin</a></p>
            <p>Login as a doctor - <a href="doctor_log.php">Login Doctor</a></p> -->
          </form>
        </div>
      </div>
    </section>
<?php

if (isset($_POST['submit'])) 
{
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $pass=md5($password);

  $sql = "SELECT * FROM user WHERE email='{$email}' AND password='{$pass}'";
  $result = mysqli_query($con, $sql);

  $sql_query = "SELECT * FROM admin WHERE username='{$email}' AND password='{$password}'";
  $res = mysqli_query($con, $sql_query);

  $query = "SELECT * FROM doctor WHERE docemail='{$email}' AND password='{$pass}'";
  $rres = mysqli_query($con, $query);

  if (mysqli_num_rows($result) === 1) 
  {
    $_SESSION['loggedin'] = $_POST['email'];
    ?>
    <script>
      location.replace("welcome.php");
    </script>
     <?php
  }
  elseif (mysqli_num_rows($res) === 1) 
  {
    ?>
    <script>
      location.replace("admin_page.php");
    </script>
     <?php
  }
  elseif (mysqli_num_rows($rres) === 1) 
  {
    $_SESSION['login'] = $_POST['email'];
    ?>
    <script>
      location.replace("doctor_page.php");
    </script>
     <?php
  }
  else 
  {
      echo "<script> alert('Email or password do not match.'); </script>";
  }
}

?> 

  </body>
</html>
