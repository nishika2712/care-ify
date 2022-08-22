<?php
session_start();
include "config.php";

$user_email = $_SESSION['login'];
$sql = "SELECT docname FROM doctor WHERE docemail = '{$user_email}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$sq = "SELECT count(*) as total from appointment a, doctor d where d.docemail = '{$user_email}' and d.id =a.docid and a.status = 1";
$re = mysqli_query($con,$sq);
$r = mysqli_fetch_array($re);

$sq1 = "SELECT count(*) as total from appointment a, doctor d where d.docemail = '{$user_email}' and d.id =a.docid and a.status = 3";
$re1 = mysqli_query($con,$sq1);
$r1 = mysqli_fetch_array($re1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>care-ify: we are here for your care</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="script" href="js/script.js" />

       <style>
        header
        {
            top: 0; left: 0; right: 0;
            background: #fff;
            padding:1rem 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
            box-shadow: var(--box-shadow);
        }

        .header .w3 .btn
        {
            width: 100px;
            margin: 0.5rem 0 2rem;
            border-radius: 0.5rem;
            border: var(--border);
            font-size: 1.4rem;
            color: var(--black);
            text-transform: none;
            padding: 1rem;
            text-align: center;
        }
        .home .content
        {
            margin-top: auto;
            padding-top: 5rem;
            text-align: center;
        }
    
        .sub-heading
        {
            text-align: center;
            color: var(--green);
            font-size: 4rem;
            padding-top: 1rem;
        }

        .list{
            text-align:center;
        }
    
        .list .box-container
        {
            padding: 2.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 1.5rem;
        }

       .list .box-container .box
        {
            padding: 2.5rem;
            background: #fff;
            border-radius: .5rem;
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
            text-align: center;
            border: 0.2rem solid cornflowerblue;
            /* height: 100%;
            margin: 0 auto; */
        }

        .list .box-container .box .content
        {
            padding: 2rem;
            padding-top: 2rem;
            
        }

        .list .box-container .box .content h3
        {
            color: var(--black);
            font-size: 2.5rem;
        }


        .list .box-container .box .content p
        {
            color: var(--black);
            font-size: 1.6rem;
            padding: .5rem 0;
            line-height: 1.5rem;
        }

        .list .box-container .box .btn 
        {
            width: 100px;
            margin: 0.7rem 0 3rem;
            border-radius: 0.5rem;
            border: var(--border);
            font-size: 1.6rem;
            color: var(--black);
            text-transform: none;
            padding: 1rem;
            text-align: center;
        }

        img{
            width: 80%;
            height: 80%;
        }

    </style>

</head>
<body>
    
    <header class="header">
        <div class="logo">
            <a href="doctor_page.php"><img src="images/logo.png" /></a>
        </div>

        <div class="w3">
        <a href="#" class="btn" id="logout"> LOG OUT </a>
        </div> 
    </header>
    <br>
    <section class="home" id="home">
        <div class="content">
            <h3 class="heading">Welcome <span><?php echo $row['docname'] ?></span></h3>
            <h4 style="text-align: center; font-size: 15px;">You have <?php echo $r['total']; ?> Appointment Requests and <?php echo $r1['total']; ?> upcoming appointments.</h4>
        </div>
    </section>
    <section class="list" id="list">
    <h3 class="sub-heading">list of activities</h3>
    <div class="box-container">
    <div class="box">
            <div class="icon">
                <img src="images/appointment.png" alt=""/> 
            </div>
            <div class="content">

                <h3>appointments</h3>
                <p>upcoming appointments and appointment requests</p>
                <a href="doc_view_appointments.php" name="submit" class="btn">OPEN</a>
            </div>
        </div>

        <div class="box">
            <div class="icon">
                <img src="images/patient.png" alt=""> 
            </div>
            <div class="content">

                <h3>view patients</h3>
                <p>have a look at all of your patients and their details</p>
                <a href="doc_view_patient.php" name="submit" class="btn">OPEN</a>
            </div>
        </div>

        <div class="box">
            <div class="icon">
                <img src="images/report.png" alt=""> 
            </div>
            <div class="content">
                <h3>medical report</h3>
                <p>create report for the appointments you took</p>
                <a href="doc_medical_report.php" class="btn">OPEN</a>
            </div>
        </div>
    </div>
    <a href="doc_view_profile.php" class="btn" id="btn1">
          view your profile <span class="fas fa-chevron-right"></span>
        </a>
    </section>
    <script>
      document.getElementById("logout").addEventListener("click",()=>{
        let logout = confirm("Do you really want to log out?");

        if(logout){
          location.replace("logout.php");
        }
      })
    </script>
</body>
</html>