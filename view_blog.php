<?php
session_start();
// error_reporting(0);
include "config.php";

$id = $_GET['eid'];
$sql = "SELECT * FROM blogs WHERE id = '{$id}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
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
		<title>Admin | Edit Blog</title>
        <style>
             body {
              text-align: center;
              background: url('<?php echo $row['image'] ?>') no-repeat fixed center;
              background-size: auto;
            }
      table {
        font-size: 20px;
        border-radius: 20px;
        background-color: var(--green);
        padding: 5px;
        position: relative;
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
        flex-direction: column;
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
      #content{
          width: 80%;
          height:  500px;
          border: solid;
          border-color: var(--green);
          border-radius:10px;
          padding:10px;
            top:0;
      }
      textarea{
          text-transform: none;
          font-size: 17px;
      }
      .heading{
          background: beige;
          border-radius: 20px;
      }
      
        </style>
	</head>
	<body>
        <section class="list" id="list">
            <h3 class="heading"><?php echo $row['heading']?></h3>
                <form action="" method="post" class="box-container" enctype="multipart/form-data">
                    <div id="table"> 
                        <textarea id="content" name="content" columns=30 rows=50 readonly><?php echo $row['content']; ?></textarea>
                    </div>
                        <input type="button" value="back" class="btn" id="cancel"/> 
                </form>
        </section>
        <script>
          document.getElementById('cancel').addEventListener("click", () =>{
            history.back();
          })
        </script>
	</body>
</html>