<?php
session_start();
include "config.php";
$id = $_GET['did'];

$sql=mysqli_query($con,"delete from blogs where id='{$id}'");
if($sql)
{
    echo " <script> alert('Blog Deleted Successfully'); </script> ";
        ?>
            <script>
              location.replace("blog_page.php");
            </script>
        <?php
}
?>