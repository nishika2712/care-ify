<?php
    session_start();
    include "config.php";
    $id = $_GET['appid'];
?>
    <script>
        let cancel = confirm("Do you really want to cancel this appointment?");

        if(cancel){
        <?php
            echo "location.replace('p_cancelappointment.php?appid= $id')";
        ?>
        }
        else{
            history.back();
        }
    </script>