<?php
    session_start();
    include "config.php";
    $id = $_GET['appid'];
            $sql=mysqli_query($con,"UPDATE appointment SET status = 2 WHERE id = '$id'");

            if($sql){
                echo "<script>alert('Appointment Request Declined')</script>";
            }
                ?>
<script>
    location.replace("doc_view_appointments.php");
</script>              
        