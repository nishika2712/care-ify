<?php

session_start();
error_reporting(0);
include "config.php";


$sql = "SELECT * FROM blogs";
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
        <a href=""><img src="images/logo.png" /></a>
      </div>
      <nav class="navbar">
        <a href="#home">home</a>
        <a href="#services">services</a>
        <a href="#about">about</a>
        <a href="login.php">doctors</a>
        <a href="#review">review</a>
        <a href="#blogs">blogs</a>
      </nav>
      <div id="menu-btn">
        <i class="fas fa-bars" onclick="openSidebar()"></i>
      </div>
    </header>

    <!-- header section ends -->

    <!-- side bar menu starts -->
    <nav id="sidebar">
      <div class="box-container">
        <div class="box">
          <a href="login.php" class="menu-opt">Log In/Sign Up</a>
          <a href="login.php" class="menu-opt">Book Appointment</a>
          <a href="#" class="menu-opt">Contact Us</a>
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
        <p>log in or sign up and become a part of the care-ify fam!</p>
        <a href="login.php" class="btn" id="btn1">
          LOG IN <span class="fas fa-chevron-right"></span>
        </a>
        <a href="signup.php" class="btn" id="btn2">
          SIGN UP <span class="fas fa-chevron-right"></span>
        </a>
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
          <a href="login.php" class="btn">
            learn more <span class="fas fa-chevron-right"></span>
          </a>
        </div>

        <div class="box">
          <i class="fas fa-ambulance"></i>
          <h3>24/7 ambulance</h3>
          <p>Contact us anytime to get an ambulance service.</p>
          <a href="login.php" class="btn">
            learn more <span class="fas fa-chevron-right"></span>
          </a>
        </div>

        <div class="box">
          <i class="fas fa-user-md"></i>
          <h3>expert doctors</h3>
          <p>Check out our expert doctors with years of experience.</p>
          <a href="login.php" class="btn">
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
            Care-ify aims to establish an ecosystem that would become the go-to destination 
            for any individual or community in the healthcare class, from high ranking 
            medical professionals to average nuclear families. 
            With an option for  paperless health records and reports for patients, 
            as well as online consultations and profiling for doctors, Care-ify intends 
            to be the one-click solution to any and all needs of the entities in the healthcare industry.
          </p>
        </div>
      </div>
    </section>

    <!-- about section ends -->

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
            <a href="login.php" class="btn">
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
      <a href="login.php" class="btn">
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
          <a href="login.php"> <i class="fas fa-chevron-right"></i> doctors </a>
          <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
          <a href="#blogs"> <i class="fas fa-chevron-right"></i> blogs </a>
        </div>

        <div class="box">
          <h3>our services</h3>
          <a href="login.php"> <i class="fas fa-chevron-right"></i> appointment booking </a>
          <a href="login.php"> <i class="fas fa-chevron-right"></i> ambulance service </a>
          <a href="login.php"> <i class="fas fa-chevron-right"></i> expert doctors </a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <a href="#"><i class="fas fa-phone"></i><?php echo $r['number']?></a>
         
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
  </body>
</html>
