<?php
    session_start();
    include "config.php";
    $id = $_GET['appid'];
    $sql=mysqli_query($con,"DELETE FROM appointment WHERE id = '$id'");

    if($sql){
        echo "<script>alert('Appointment Successfully Deleted')</script>";
        ?>
        <script>
            location.replace("patview_appoint.php");
        </script>
        <?php
    }
?>