<?php
session_start();
error_reporting(0);
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
    body 
    {
      height: 100vh;
      padding: 20px;
      opacity: 0.9;
      background: url("images/forgotPass.png") no-repeat center center / cover;
    }

	  .login .box-container 
    {
      height: 90vh;
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

    body::before 
    {
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
    input-icon .box 
    {
      width: 10px;
    }

  </style>
	<body class="login">
		<div class="box-container">
				<div class="box">
					<form class="form-login" method="post">
						<fieldset>
            <h1 class="heading">Patient Reset Password</h1>

							<p> Please enter your Email and name to recover your password.<br /> </p>

								<label for="name"> <i class="fas fa-user"></i>Name</label>
								<input type="text" class="box" name="name" placeholder="Registred Name">
                            <br>
								<label for="email"> <i class="fas fa-user"></i>E-mail</label>
            		<input type="text" class="box" name="email" placeholder="Registred Email">
                            <br>
								<button name="submit" class="btn" type="submit"> Reset </button>

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
  if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $query=mysqli_query($con,"select id from  user where name='$name' and email='$email'");
    $row=mysqli_num_rows($query);
    $query1=mysqli_query($con,"select id from doctor where docname='$name' and docemail='$email'");
    $row1=mysqli_num_rows($query1);
    if($row>0 || $row1>0)
    {
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
      ?>
        <script>
          location.replace("reset-pass.php");
        </script>
      <?php
    }
    else 
    {
      echo "<script>alert('Invalid details. Please try with valid details');</script>";
      ?>
        <script>
          location.replace("forgot_pass.php");
        </script>
      <?php
    }
  }
?>
	</body>
</html>