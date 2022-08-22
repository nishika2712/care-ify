<?php

session_start();
error_reporting(0);
include "config.php";

$user_email = $_SESSION['loggedin'];
$sql = "SELECT name FROM user WHERE email = '{$user_email}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$s="SELECT * FROM contact";
$re = mysqli_query($con, $s);
$r = mysqli_fetch_array($re);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>care-ify: we are here for your care</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <header class="header">
      <div class="logo">
        <a href="welcome.php"><img src="images/logo.png" /></a>
      </div>
      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#services">services</a>
        <a href="#about">about</a>
        <a href="#doctors">doctors</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a> 
      </nav>
      <div id="menu-btn">
        <a style="color:var(--green)" href="patient_profile.php"><i class="fas fa-user">  <?php echo $row['name']?></i></a>
        <i style="padding-left: 20px;" class="fas fa-bars" onclick="openSidebar()"></i>
      </div>
    </header>

    <!-- header section ends -->

    <!-- side bar menu starts -->
    <nav id="sidebar">
      <div class="box-container">
        <div class="box"> 
        <a href="patient_profile.php" class="menu-opt">Profile</a>
          <a href="p_report_list.php" class="menu-opt">My Reports</a>
          <a href="patview_appoint.php" class="menu-opt">My Appointments</a>
          <a href="doctors.php" class="menu-opt">Book Appointment</a>
          <a href="contact_us.php" class="menu-opt">Contact Us</a>
          <a href="#" class="menu-opt" id="logout">Logout</a>
        </div>
      </div>
    </nav>
    <!-- side bar menu ends -->

    <!-- home section starts  -->

    <section class="home" id="home" onclick="closeSidebar()">
      <div class="image">
        <img src="images/doctor_patient.png" alt="" class="floating" />
      </div>
      <div class="content">
        <h3>
          We are here for <br />
          your care 24/7  
        </h3>       
        <!-- <p>
          Welcome  <i class="fas fa-user"> 
          <php
            $sql=mysqli_query($con,"select name from user where email='".$_SESSION['email']."'");
            while($data=mysqli_fetch_array($sql))
            {  
              echo htmlentities($data['name']); 
            }
          ?> </i> 
        </p> -->
      </div>
    </section>

    <!-- home section ends -->

    <!-- services section starts  -->

    <section class="services" id="services" onclick="closeSidebar()">
      <h1 class="heading">our <span>services</span></h1>

      <div class="box-container">
        <div class="box">
          <i class="fas fa-notes-medical"></i>
          <h3>Book Appointment</h3>
          <p>
            Book an appointment easily and check the availability of doctors.
          </p>
          <a href="doctors.php" class="btn">
            learn more <span class="fas fa-chevron-right"></span>
          </a>
        </div>

        <div class="box">
          <i class="fas fa-ambulance"></i>
          <h3>24/7 ambulance</h3>
          <p>Contact us anytime to get an ambulance service.</p>
          <a href="contact_us.php" class="btn">
            learn more <span class="fas fa-chevron-right"></span>
          </a>
        </div>

        <div class="box">
          <i class="fas fa-user-md"></i>
          <h3>expert doctors</h3>
          <p>Check out our expert doctors with years of experience.</p>
          <a href="doctors.php" class="btn">
            learn more <span class="fas fa-chevron-right"></span>
          </a>
        </div>
      </div>
    </section>

    <!-- services section ends -->

    <!-- about section starts  -->

    <section class="about" id="about" onclick="closeSidebar()">
      <h1 class="heading"><span>about</span> us</h1>

      <div class="row">
        <div class="image">
          <img src="images/aboutus.png" alt="" class="floating" />
        </div>

        <div class="content">
          <h3>we take care of your healthy life</h3>
          <p>
            Care-ify aims to establish an ecosystem that would become the go-to destination for any individual or community in the healthcare class, from high ranking medical professionals to average nuclear families. 
            With an option for  paperless health records and reports for patients, as well as online consultations and profiling for doctors, Care-ify intends to be the one-click solution to any and all needs of the entities in the healthcare industry.
          </p>
        </div>
      </div>
    </section>

    <!-- about section ends -->

    <!-- doctors section starts  -->

    <section class="doctors" id="doctors" onclick="closeSidebar()">
      <h1 class="heading">our <span>doctors</span></h1>

      <div class="box-container">
        <div class="box">
          <img src="images/doctors/dkroy.jpg" alt="D K Roy" />
          <h3>Dr. D K Roy</h3>
          <span>Cardiologist</span>
          <div class="share">
            <a href="bookappointment.php?docid=1">book now</a>
          </div>
        </div>

        <div class="box">
          <img src="images/doctors/supriyasingh.jpg" alt="Supriya Singh" />
          <h3>Dr. Supriya Singh</h3>
          <span>Gynaecologist</span>
          <div class="share">
          <a href="bookappointment.php?docid=2">book now</a>
          </div>
        </div>

        <div class="box">
          <img src="images/doctors/spmathur.jpg" alt="S P Mathur" />
          <h3>Dr. S P Mathur</h3>
          <span>ENT specialist</span>
          <div class="share">
          <a href="bookappointment.php?docid=3">book now</a>
          </div>
        </div>

        <div class="box">
          <img src="images/doctors/adityaverma.jpg" alt="Aditya Verma" />
          <h3>Dr. Aditya Verma</h3>
          <span>Pulmonologist</span>
          <div class="share">
          <a href="bookappointment.php?docid=4">book now</a>
          </div>
        </div>

        <div class="box">
          <img src="images/doctors/riyachhabra.jpg" alt="Riya Chhabra" />
          <h3>Dr. Riya Chhabra</h3>
          <span>Psychiatrists</span>
          <div class="share">
          <a href="bookappointment.php?docid=5">book now</a>
          </div>
        </div>

        <div class="box">
          <img src="images/doctors/rkmishra.jpg" alt="R K Mishra" />
          <h3>Dr. R K Mishra</h3>
          <span>Neurologist</span>
          <div class="share">
          <a href="bookappointment.php?docid=6">book now</a>
          </div>
        </div>
      </div>
      <br />
      <a href="doctors.php" class="btn">
        check out the full list <span class="fas fa-chevron-right"></span>
      </a>
    </section>

    <!-- doctors section ends -->

    <!-- review section starts  -->

    <section class="review" id="review" onclick="closeSidebar()">
      <h1 class="heading">client's <span>review</span></h1>

      <div class="box-container">
        <div class="box">
          <img src="images/img1.jpg" alt="" />
          <h3>Ramesh Gupta</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text">Very good doctors. helpful and polite staff</p>
        </div>

        <div class="box">
          <img src="images/img2.jpg" alt="" />
          <h3>Sneha Agarwal</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p class="text">
            had a wonderful experience. Very polite and helpful staff
          </p>
        </div>

        <div class="box">
          <img src="images/img3.jpg" alt="" />
          <h3>Raghav Joshi</h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
          <p class="text">Very nice experience.</p>
        </div>
      </div>
    </section>

    <!-- review section ends -->

    <!-- blogs section starts  -->

    <section class="blogs" id="blogs" onclick="closeSidebar()">
      <h1 class="heading">our <span>blogs</span></h1>

      <div class="box-container">
        <?php
        $s2 = "SELECT * FROM blogs ORDER BY date desc LIMIT 3";
        $r2 = mysqli_query($con,$s2);
   
        if(mysqli_num_rows($r2) > 0) 
        {  
          // Output data of each row
          $idarray= array();
          while($r4 = mysqli_fetch_assoc($r2)) 
          {
            // Create an array to store the
            // id of the blogs        
            array_push($idarray,$r4['id']); 
          } 
        }
        else 
        {
            echo "0 results";
        }

        for($x = 0; $x < 3; $x++)
        {
          if(isset($x))
          {
            $s1 = "SELECT * FROM blogs WHERE id = '$idarray[$x]'";
            $q = mysqli_query($con,$s1);
            $r1 = mysqli_fetch_array($q);
            $h = $r1['heading'];
            $d = date('d-m-Y h:i a',strtotime($r1['date']));
            
            echo "<div class='box'>";
              echo "<div class='image'>";
                echo "<img src='$r1[image]' />";
        ?>
            
          </div>
          <div class="content">
            <div class="icon">
              <a href="#"
                ><i class="fas fa-calendar"><p></p></i><?php echo $d; ?></a
              >
            </div>
            <a href="#">
              <h3><?php echo $h; ?></h3>
            </a>
            <?php 
            echo "<a href='view_blog.php?eid=$r1[id]' class='btn'>";
            ?>
              read more <span class="fas fa-chevron-right"></span>
            </a>
          </div>
        </div>
        <?php
          }
        }
          ?>
      </div>

      <br />
      <a href="p_view_blogs.php" class="btn">
        check out more blogs <span class="fas fa-chevron-right"></span>
      </a>
    </section> 

    <!-- blogs section ends -->

    <!-- footer section starts  -->

    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>quick links</h3>
          <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
          <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
          <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
          <a href="#doctors"> <i class="fas fa-chevron-right"></i> doctors </a>
          <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
          <a href="#blogs"> <i class="fas fa-chevron-right"></i> blogs </a>
        </div>

        <div class="box">
          <h3>our services</h3>
          <a href="doctors.php"> <i class="fas fa-chevron-right"></i> Appointment Booking </a>
          <a href="contact_us.php"> <i class="fas fa-chevron-right"></i> Ambulance Service </a>
          <a href="doctors.php"> <i class="fas fa-chevron-right"></i> Expert Doctors </a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <a href="welcome.php"><i class="fas fa-phone"></i><?php echo $r['number']?></a>
         
          <a href="mailto:careifycare@gmail.com"> <i class="fas fa-envelope"></i> <?php echo $r['email']?></a>
         
          <a href="#"> <i class="fas fa-map-marker-alt"></i><?php echo $r['address']?></a>
        </div>

        <div class="box">
          <h3>follow us</h3>
          <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i> facebook </a>
          <a href="https://twitter.com/"> <i class="fab fa-twitter"></i> twitter </a>
          <a href="https://www.instagram.com/"> <i class="fab fa-instagram"></i> instagram </a>
          <a href="https://www.linkedin.com/"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>
      </div>

      <div class="credit">
        &copy; 2022 by <span> Group CSIT16 </span> | B.Tech 3rd year
      </div>
    </section>

    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
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
