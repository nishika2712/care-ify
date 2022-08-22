<?php
    session_start();
    include "config.php";
    $id = $_GET['appid'];
            $sql=mysqli_query($con,"UPDATE appointment SET status = 3 WHERE id = '$id'");

            if($sql){
                echo "<script>alert('Appointment Confirmed')</script>";
            }
                ?>
<script>
    location.replace("doc_view_appointments.php");
</script>              
        