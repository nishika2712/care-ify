<?php
session_start();
//error_reporting(0);
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
    <script type="text/javascript">
    function valid()
    {
        if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            document.passwordreset.password_again.focus();
            return false;
        }
        return true;
    }
    </script>
</head>
<style>
  body {
      height: 100vh;
      padding: 20px;
      opacity: 0.9;
      /* background: url("image/loginbg.png") no-repeat center center / cover; */
    }

    .login .box-container {
      height: 80vh;
    } 

    .login .box-container .box 
    {
      background: #fff;
      border-radius: 0.5rem;
      box-shadow: 0.3rem 0.3rem 0 rgba(139, 199, 255, 0.2);
      border: 0.2rem solid cornflowerblue;
      padding: 2.5rem;
      width: 50%;
      height: 100%;
      margin: 0 auto;
      text-align: center;
    }

    .login .box-container form .box 
    {
      width: 65%;
      margin: 0.7rem 0 3rem;
      border-radius: 0.5rem;
      border: 0.2rem solid cornflowerblue;
      font-size: 1.6rem;
      color: #444;
      text-transform: none;
      padding: 1rem;
      text-align: left;
    }

    .login .heading 
    {
      text-align: center;
      padding-bottom: 2rem;
      text-shadow: 0.2rem 0.2rem 0 rgba(0, 0, 0, 0.2);
      text-transform: uppercase;
      color: #444;
      font-size: 2rem;
      letter-spacing: 0.3rem;
      margin-bottom: 30px;
    }

    body::before {
      content: "";
      background-image: linear-gradient(cornflowerblue, #fff);
      background-size: cover;
      position: absolute;
      top: 0px;
      right: 0px;
      bottom: 0px;
      left: 0px;
      opacity: 0.75;
      z-index: -1;
    }
    input .box {
      width: 5px;
    }
</style>
	<body class="login">
		<div class="box-container">
			<div class="box">
				    <form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
				    <fieldset>
                    <h1 class="heading">Patient Reset Password</h1>
					    <p>Please set your new password.
					    </p>                    
                    
              <label for="password"> <i class="fas fa-lock"></i>Password</label>
              <input type="password" class="box" id="password" name="password" placeholder="New Password" minlength=6 maxlength=30 required>
                <br>
              <label for="password"> <i class="fas fa-key"></i>Confirm</label>
              <input type="password" class="box" id="password_again" name="password_again" placeholder="Confirm Password" required>
							<br>
				      <button name="submit" name="submit" class="btn" type="submit"> Change </button>
                    
			        <div class="new-account">
			            Already have an account? 
				        <a href="login.php">
					    Log-in
				        </a>
			        </div>

			        </fieldset>
		            </form>	
                </div>
            </div>
        </div>
	
<?php

// Code for updating Password
if(isset($_POST['submit']))
{
  $name=$_SESSION['name'];
  $email=$_SESSION['email'];
  $newpassword=$_POST['password'];
  $newpassword=md5($newpassword);

  $q = "SELECT *
        FROM user
        WHERE email = '$email'";

  $qe = mysqli_query($con,$q);
  $res1 = mysqli_fetch_array($qe);

  if($res1){
    $query=mysqli_query($con,"update user set password='$newpassword' where name='$name' and email='$email'");
    if ($query) 
    {
      echo "<script>alert('Password successfully updated.');</script>";
      ?>
          <script>
            location.replace("login.php");
          </script>
      <?php
    }
  }
  else{
    $query=mysqli_query($con,"update doctor set password='$newpassword' where docname='$name' and docemail='$email'");
    if ($query) 
    {
      echo "<script>alert('Password successfully updated.');</script>";
      ?>
          <script>
            location.replace("login.php");
          </script>
      <?php
    }
  }
}

?>
	</body>
	<!-- end: BODY -->
</html>