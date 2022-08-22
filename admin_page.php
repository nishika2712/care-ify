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
            <h3 class="heading">Welcome <span>admin</span></h3>
        </div>
    </section>
    <section class="list" id="list">
    <h3 class="sub-heading">list of activities</h3>
    <div class="box-container">
    <div class="box">
            <div class="icon">
                <img src="images/doctors.png" alt=""/> 
            </div>
            <div class="content"> 
 
                <h3>view doctors</h3> 
                <p>have a look at the doctors</p> 
                <a href="admin_viewd.php" class="btn">OPEN</a> 
                 
            </div> 
        </div>

        <div class="box">
            <div class="icon">
                <img src="images/patient.png" alt=""> 
            </div>
            <div class="content"> 
 
                <h3>view patients</h3> 
                <p>have a look at the patients</p> 
                <a href="admin_viewp.php" class="btn">OPEN</a> 
                 
            </div> 
        </div>

        <div class="box">
            <div class="icon">
                <img src="images/blog.png" alt=""> 
            </div>
            <div class="content"> 
 
            <h3>blogs</h3> 
            <p>add or update blogs</p> 
            <a href="blog_page.php" class="btn">OPEN</a> 
            
            </div> 
        </div>
        <div class="box"> 
            <div class="image"> 
               
                <img src="images/contactus.png" alt="">  
                 
            </div> 
            <div class="content"> 
 
                <h3>contact info</h3> 
                <p>update the contact info</p> 
                <a href="update_contact.php" class="btn">UPDATE</a> 
                 
            </div> 
        </div> 
        <div class="box"> 
            <div class="image">              
                <img src="images/hospitals.jpg" alt="">                 
            </div> 
            <div class="content"> 
                <h3>departments</h3> 
                <p>view all the departments</p> 
                <a href="admin_viewdept.php" class="btn">OPEN</a>                  
            </div> 
        </div>         
    </div>
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