<?php
session_start();
error_reporting(0);
include "database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- <link rel="stylesheet" href="asset/main.css">--->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/term_condition.css">
    <link rel="stylesheet" href="trem.css">

    <title>User Dashboard</title>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
<style>/* Full-screen blur background */
.logout-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3); /* Semi-transparent background */
    backdrop-filter: blur(1px); /* Adds a blur effect */
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

/* Modal content box */
.logout-content {
    background-color: #346982;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    max-width: 400px;
    width: 100%;
}

.confirm-btn, .cancel-btn {
    margin: 10px;
    font-size:1.2rem;
    cursor: pointer;
}

.confirm-btn {
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    margin-left:9rem;
    padding: 9px 23px;
   
}

.cancel-btn {
    background-color: #000;
    color: white;
    border: none;
    border-radius: 5px;
    margin-left:9rem;
    padding: 9px 25px;
}
.logout-content p{
  color:white;
  font-size:1.3rem;
}
</style>
</head>


<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+01123456790" class="helpline-box">

          <div class="icon-box">
          <i class="fa-solid fa-phone fa-lg"></i>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+01 (123) 4567 90</p>
          </div>

        </a>
        <a href="#" class="logo">
        <img src="img/logo.png" class="header_logo" alt="">
        </a>
  

        <div class="header-btn-group">

         
          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">


     <!--- <a class="user_name" href="user_profile.php">
       
       <?php
           // Ensure the session has been started and the database connection is established
           // Or the file where you define $conn (MySQLi connection)
       
           // Check if the session variable 'id' is set
           if (isset($_SESSION['id'])) {
               $id = $_SESSION['id'];
       
               // Query to fetch user details
               $sql = "SELECT * FROM `users` WHERE id = $id";
               $query = mysqli_query($conn, $sql); // Using $conn for MySQLi connection
       
               // Check if any user data was retrieved
               if (mysqli_num_rows($query) > 0) {
                   // Loop through the result and fetch user data
                   while ($result = mysqli_fetch_assoc($query)) {
                       ?>
                       <i class="fa-solid fa-user" id="usericone"></i>
                       <p class="username"><?php echo htmlspecialchars($result['name']); ?></p>
                       <?php
                   }
               } else {
                 ?>
                 
                  
                   <i class="fa-solid fa-user" id="usericone"></i>
                   <?php
                    // Handle case when no user data is found
                   echo '<p class="username">Guest</p>';
               }
           } else {
               // Handle case when the user is not logged in (session 'id' is not set)
               ?>
                 
             
               <i class="fa-solid fa-user" id="usericone"></i>
               <?php
                 // Handle case when no user data is found
               echo '<p class="username">Guest</p>';
           }
       ?>
       
        </a>
  --->
      <div class="logo-title">Go Tour</div>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>


<ul class="navbar-list">

<li>
  <a href="home.php" class="navbar-link" data-nav-link>home</a>
</li>

<li>
  <a href="package.php" class="navbar-link" data-nav-link>packages</a>
</li>

<li>
  <a href="about.php" class="navbar-link" data-nav-link>about us</a>
</li>

<li>
  <a href="contact.php" class="navbar-link" data-nav-link>contact us</a>
</li>

<li>
  <a href="booking-history.php" class="navbar-link" data-nav-link>My Booking</a>
</li>
<li><a class="navbar-link" href="user_profile.php">Profile</a></li>

<div class="header-btn-group">
    <?php if (isset($_SESSION['id'])): ?>
        <!-- If the user is logged in -->
        <li>
    <a class="navbar-link" href="logout.php" id="logout-btn">Logout</a>
</li>
<div id="logout-modal" class="logout-modal">
    <div class="logout-content">
        <p>Are you sure you want to log out?</p>
        <button onclick="confirmLogout()" class="confirm-btn">Yes</button>
        <button onclick="cancelLogout()" class="cancel-btn">No</button>
    </div>
</div>
    <?php else: ?>
        <!-- If the user is not logged in -->
        <li>
  <a href="sign-in.php" class="signin-btn" data-nav-link>Sign-in</a>
</li>
    <?php endif; ?>
</div>


</ul>
        </nav>
      </div>
    </div>

  </header>

    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        

        <h1 style="font-size:50px" class="heading">
                  <span class="span" >Terms & Conditions</span>
                 
  </h1>

        </div>
      </section>
 
<section class="terms">
  <h4>Terms and Conditions</h4>
  <p>Welcome to Go Tour! By accessing or using our services, you agree to comply with and be bound by the following terms and conditions. Please read them carefully before using the platform.
  If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.
</p>

<h4>Consent</h4>
<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.

</p>

<h4>Your booking</h4>
<p>Booking details must be completed personally by the traveler or by one person on behalf of a group who is deemed authorized by individual members <br>
Users are responsible for providing correct details when making a booking. <br>
All bookings are subject to the terms of the respective service provider. <br>
</p>
<h4> Payment Terms</h4>
<p>If payment is not made within 12 hours, the booking will be cancelled.
  <br>
  Payment must be completed as per the terms communicated during the booking process. <br>
  If you want to pay online then you must add email id and booking id in the reference. <br>
  If you pay via credit card then fill up given information.
</p>
 
<h4>Cancellation by the Passenger</h4>
<p>Any Users may cancel the tour arrangements at any time via online channels or by using the same email address that was used for confirmation Written notification from the person who signed the booking form must be received by Go Tour for such cancellation. The User would have been advised of the cancellation policy at the time of confirmation any cancellation changes may apply</p>

<h4>Changes to the Itinerary by Go Tour</h4>
<p>Go Tour reserves the right to make occasional changes at any time. Most of these changes may relate to flight timings and carriers. 
  Go Tour undertakes to inform the Client at the earliest opportunity of such changes. Go Tour cannot under any circumstances accept any responsibility for any expenses or costs the Client may incur as a result of a change which it’s beyond its reasonable control.
</p>

<h4>How we use your information</h4>
<p>We use the information we collect in various ways, including to:

Provide, operate, and maintain our website
Improve, personalize, and expand our website
Understand and analyze how you use our website
Develop new products, services, features, and functionality
Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes
Send you emails
Find and prevent fraud
</p>

<h4>General</h4>

<h5>The content in this Site may be used for lawful purposes only. Unless otherwise stated herein:</h5>

<p>Permission is given to view, print, and use the content in this Site only for personal, noncommercial use, provided that no copyright, service trademark, or other proprietary notices which accompany any such content are copied, reproduced, deleted, altered or changed. <br>
Content in this Site may not be copied, reproduced, transmitted, displayed, downloaded, uploaded, posted, distributed, rented, sub-licensed, altered, stored for subsequent use, or otherwise used in whole or in part in any manner without  Tours and Trips Bangladesh’s prior written consent. <br>
Use of the content in this Site for any other purpose violates Tours and Trips Bangladesh’s intellectual property rights. and <br>
Nothing in this Site will be construed as conferring upon any user of this Site any license to any Tours and Trips Bangladesh, or any third party’s, intellectual property rights.
</p>
</section>


        </div>
    </div>

       <!--===========Footer=================-->
       <div class="footer">
      <div class="container_footer">
      <div class="row">
        <div class="col-md-4">
           <div class="logo_title">Go Tour</div>
      <img src="img/logo.png" class="footer_logo" alt="">

      <p class="footer_text">Traveling allows you to experience different parts of the world and immerse yourself in new cultures. You can try new foods, learn new customs, and see things you've never seen before.Here Go Tour is a leading tour operator of Bangladesh.Go Tour offer inbound and outbound tour for Traveler.</p>
    </div>




        <div class="col-md-4"> 
          <div class="box-container">
          <div class="box">
         <h3>Quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="user_profile.php"> <i class="fas fa-angle-right"></i> Profile</a>
         <a href="gallery.php"> <i class="fas fa-angle-right"></i> Gallery</a>
         <a href="service_review.php"> <i class="fas fa-angle-right"></i> Review</a>
         <a href="term_condition.php"> <i class="fas fa-angle-right"></i> Terms of use</a>
      </div>
    </div>
</div>

        <div class="col-md-4">
          <div class="contact_box">
         <h3>Contact Info</h3>
         <p class="contacr_info"><i class="fas fa-phone"></i> +880-1517-089144</p>
         <p class="contacr_info"><i class="fas fa-phone"></i> +111-2222-333333</p>
         <p class="contacr_info"><i class="fas fa-envelope"></i> munia19800@gmail.com</p>
         <p class="contacr_info"><i class="fas fa-location"></i> Dhaka, Bangladesh - 1215</p>
        
         
      </div>
    </div>
      </div>
        </div>
        <div class="credit"><span>Copyright © 2024 Go Tour.</span> | all rights reserved! </div>
    </div>

    <script src="home.js"></script>
    <script>
document.getElementById("logout-btn").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent the default link action
    document.getElementById("logout-modal").style.display = "flex"; // Show the modal
});

function confirmLogout() {
    window.location.href = "logout.php"; // Redirect to logout page
}

function cancelLogout() {
    document.getElementById("logout-modal").style.display = "none"; // Hide the modal
}

</script>

    
</body>
</html>


