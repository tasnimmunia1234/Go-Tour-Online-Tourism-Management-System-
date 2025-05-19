<?php
session_start(); // Ensure the session is started
error_reporting(0);
include 'database.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picnic Package</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="asset/category_packages.css">
    
   <style>

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/cover.png");
}
</style>
</head>
<body>
    
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
<a class="user_name">
       
       <?php
           // Ensure the session has been started and the database connection is established
           include "config.php"; // Or the file where you define $conn (MySQLi connection)
       
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
    <div class="logo">Go Tour</div>
    <ul class="menu">
        <li><a  href="home.php">Home</a></li>
        <li><a href="package.php">Packages</a></li>
       
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="booking-history.php">My Booking</a></li>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    More  Options
  </button>
  <div class="dropdown-menu contain-box" aria-labelledby="dropdownMenu2">
    
    <li><a class="btn btn-info" href="user_profile.php"><i class="fas fa-user"></i></a></li>
    <li><a class="btn btn-info" href="gallery.php">Gellary</a></li>
    <li><a class="btn btn-info" href="review.php">Review</a></li>
    <li><a class="btn btn-danger" href="dashbord.php">Logout</a></li>
    
  </div>
</div>
    
</nav>

<div class="hero-image">
  <div class="hero-text">
  <h1 style="font-size:50px" class="heading">
    
    <span class="span">O</span>
    <span class="span">F</span>
    <span class="span">F</span>
    <span class="span">E</span>
    <span class="span">R</span>
    <span >-</span>
    
    <span class="span">P</span>
    <span class="span">A</span>
    <span class="span">C</span>
    <span class="span">K</span>
    <span class="span">A</span>
    <span class="span">G</span>
    <span class="span">E</span>

</h1>
    <p class="ptext">Go and explore with your friends</p>
    
  </div>
</div>
<div class="container" id="container">
    <div class="row">
        <div class="col" id="col"><a href="couplepackage.php" class="btn"><p>Couple Package</p></a></div>
        <div class="col" id="col"><a href="familypackage.php" class="btn"><p>Family Package</p></a></div>
        <div class="col" id="col"><a href="internationalpack.php" class="btn "><p>International Package</p></a></div>
        <div class="col" id="col"><a href="picnicpackage.php" class="btn "><p>Picinc Package</p></a></div>
        <div class="col" id="col"><a href="offerpackage.php" class="btn "><p>Offer Package</p></a></div>
       
    </div>
</div>

<section class="packages">

<main class="main">

<?php

$select_packages = mysqli_query($conn, "SELECT * FROM `packages`");
if(mysqli_num_rows($select_packages) > 0){
    
   while($fetch_package = mysqli_fetch_assoc($select_packages)){
    if($fetch_package["category"]=='offer package'){
?>


    <form action="" method="post">
    <div class="card">
        <div class="image">
        <img src="uploaded_img/<?php echo $fetch_package['image']; ?>"  alt="">
        </div>
        <div class="caption">
        <p class="package_name"><i class="fa-solid fa-location-dot"></i> <?php echo $fetch_package['name']; ?></p>
            <p class="rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </p>
          
           
            <h4 class="msg"><?php echo $fetch_package['msg']; ?></h4>

            <p class="price">BDT <?php echo $fetch_package['price']; ?>/-</p>
            <input type="hidden" name="p_name" value="<?php echo $fetch_package['name']; ?>">
            <input type="hidden" name="p_price" value="<?php echo $fetch_package['price']; ?>">
            <input type="hidden" name="p_image" value="<?php echo $fetch_package['image']; ?>">
            <input type="hidden" name="p_msg" value="<?php echo $fetch_package['msg']; ?>">
            
            <div><a href="package_details.php?pak_id=<?php echo $fetch_package['pak_id']; ?>" name="add" class="add">See Details</a></button> </div>
        </div>
        
    </div>
  
</form>
  
<?php
   };
         };
      };
      ?>
</main>
 </section>
</div>



       <!--===========Footer=================-->
       <div class="footer">
      <div class="container">
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
         <a href="review.php"> <i class="fas fa-angle-right"></i> Review</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Terms of use</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>