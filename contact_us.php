<?php
session_start();
//error_reporting(0);
include "config.php";
$s="SELECT * FROM contact";
$re = mysqli_query($con, $s);
$r = mysqli_fetch_array($re);

if(isset($_POST['submit']))
{
	// $fname=$_POST['name'];
    $number=$_POST['number'];  
    $email=$_POST['email'];
    $address=$_POST['address'];

    $sql=mysqli_query($con,"Update contact set number='$number',email='$email',address='$address'");
    if($sql)
    {
        echo " <script> alert('contact info updated Successfully'); </script> ";
        ?>
            <script>
              location.replace("admin_page.php");
            </script>
        <?php
    }
}
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
		<title>User | Edit Profile</title>
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
        margin-bottom: 20px; 
      }
      input{
        font-size: 15px;
        text-align: center;
        width: 300px;
      }
      .box-container {
        padding-top: 20px;
      }
        </style>
	</head>
	<body>
        <section class="list" id="list">
            <h3 class="heading">contact <span>us</span></h3>
                <div class="box-container">
                    <div id="table"> 
                        <table>
                                <tr>
                                    <th>Contact Number</th>
                                    <td><input type="text" name="number" value="<?php echo $r['number']; ?>" /></td>
                                    </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><input type="email" name="email" value="<?php echo $r['email']; ?>"/></td>
                                </tr>
                                <tr>
                                    <th>address</th>
                                    <td><input type="text" name="address" value="<?php echo $r['address']; ?>" /></td>
                                    </tr>
                                    
                                    
                        </table> 
                       </div>  
                </div>
        </section>
            
	</body>
</html>