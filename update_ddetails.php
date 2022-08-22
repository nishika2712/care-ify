<?php
session_start();
error_reporting(0);
include "config.php";

$user_email = $_SESSION['login'];
$sql = "SELECT * 
        FROM doctor d, department s 
        WHERE docemail = '{$user_email}'
        AND d.specialization = s.id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
    $contactno=$_POST['phno'];  
    $qual=$_POST['qual'];

    $sql=mysqli_query($con,"Update doctor set docname='$name', docno='$contactno', qualification='$qual' where docemail='{$user_email}'");
    if($sql)
    {
        echo " <script> alert('Your Profile updated Successfully'); </script> ";
        ?>
            <script>
              location.replace("doctor_page.php");
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
            <h3 class="heading">EDIT <span>PROFILE</span></h3>
                <form action="" method="post" class="box-container">
                    <div id="table"> 
                        <table>
                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" pattern="[a-zA-Z'-''.'\s]*" oninvalid="this.setCustomValidity('Enter a valid name.')" oninput="this.setCustomValidity('')" name="name" value="<?php echo $row['docname']; ?>"/></td> 
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><input type="email" name="email" value="<?php echo $row['docemail']; ?>" readonly/></td>
                                </tr>
                                <tr>
                                    <th>Contact No</th>
                                    <td><input type="text" name="phno" minlength=10 oninvalid="this.setCustomValidity('Enter a valid phone number.')" oninput="this.setCustomValidity('')" value="<?php echo $row['docno']; ?>" /></td>
                                </tr>
                                <tr>
                                    <th>Specialization</th>
                                    <td><input type="text" name="specialization" value="<?php echo $row['specialization']; ?>"  readonly/></td>
                                </tr>
                                <tr>
                                    <th>Qualification</th>
                                    <td><input type="text" name="qual" value="<?php echo $row['qualification']; ?>"/></td>
                                </tr>
                        </table> 
                    </div>
                        <input type="submit" value="Submit" class="btn" name="submit"/> 
                        <input type="button" value="cancel" class="btn" id="cancel"/>     
                </form>
        </section>
        <script>
          document.getElementById('cancel').addEventListener("click", () =>{
            history.back();
          })

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