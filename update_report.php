<?php
session_start();
//error_reporting(0);
include "config.php";
$rep = $_GET['report'];
$m = "SELECT *
      FROM report
      WHERE id = '$rep'";
$n = mysqli_query($con,$m);
$o = mysqli_fetch_array($n);

if(isset($_POST['submit']))
{
	$disease=$_POST['diagnosis'];
    $prescription=$_POST['prescription'];  
    $visit_date=$_POST['visit'];
    $remarks=$_POST['remarks'];

    $sql=mysqli_query($con,"update report set disease='$disease', prescription='$prescription', visit='$visit_date', remarks='$remarks' where id = '$rep' ");
    if($sql)
    {
        echo " <script> alert('Report Updated Successfully'); </script> ";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Care-ify</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

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
      <h3 class="heading">UPDATE <span>REPORT</span></h3>
        <form action="" method="post" class="box-container">
          <div id="table"> 
            <table>
              <tr>
                <th>Diagnosis</th>
                <td><input type="text" name="diagnosis" value="<?php echo $o['disease']; ?>" /></td>
              </tr>
              <tr>
                <th>Prescription</th>
                <td><input type="text" name="prescription" value="<?php echo $o['prescription']; ?>" /></td>
              </tr>
              <tr>
                <th>Visit After</th>
                <td><input type="text" name="visit" value="<?php echo $o['visit']; ?>" /></td>
              </tr>
              <tr>
                <th>Remarks</th>
                <td><input type="text" name="remarks" value="<?php echo $o['remarks']; ?>" /></td>
              </tr>
            </table> 
           </div>
            <input type="submit" value="Submit" class="btn" name="submit"/> 
            <input type="button" value="cancel" class="btn" id="cancel"/>     
          </form>
          <script>
          document.getElementById('cancel').addEventListener("click", () =>{
            history.back();
          })
        </script>
      </div>
    </section>
</body>
</html>