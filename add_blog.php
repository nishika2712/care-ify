<?php
session_start();
// error_reporting(0);
include "config.php";
$targetDir = "images/blogs/";

if(isset($_POST['submit']))
{
    if(!empty($_FILES["uploadedFile"]["name"])) { 
        $fileName = basename($_FILES["uploadedFile"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            if(move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $targetFilePath)){ 
            $heading=$_POST['heading'];
            $content=$_POST['content'];

    $sql=mysqli_query($con,"insert into blogs(heading,content,image) values('$heading','{$content}','$targetFilePath')");
    if($sql)
    {
        echo " <script> alert('Blog Added Successfully'); </script> ";
        ?>
            <script> 
                location.replace("blog_page.php"); 
            </script> 
        <?php
    }
    }
}
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
		<title>Admin | Create Blog</title>
        <style>
             body {
              text-align: center;
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
          width: 70%;
          height:  500px;
          border: solid;
          border-color: var(--green);
          border-radius:10px;
          padding:10px;
            top:0;
      }
      textarea{
          text-transform: none;
      }
        </style>
	</head>
	<body>
        <section class="list" id="list">
            <h3 class="heading">Create<span> BLOG</span></h3>
                <form action="" method="post" class="box-container" enctype="multipart/form-data">
                    <div id="table"> 
                        <table>
                                <tr>
                                    <th>Heading</th>
                                    <td><input type="text" name="heading" value="" required/></td> 
                                </tr>
                                <tr>
                                    <th>Change Image</th>
                                    <td><input type="file" name="uploadedFile" value="" id="uploadedFile" required/></td>
                                </tr>
                        </table> 
                        <textarea id="content" name="content" placeholder="Type the blog here." rows=50 required></textarea>
                    </div>
                        <input type="submit" value="Submit" class="btn" name="submit"/> 
                        <input type="button" value="cancel" class="btn" id="cancel"/> 
                </form>
        </section>
        <script>
          document.getElementById('cancel').addEventListener("click", () =>{
            history.back();
          })
        </script>
	</body>
</html>