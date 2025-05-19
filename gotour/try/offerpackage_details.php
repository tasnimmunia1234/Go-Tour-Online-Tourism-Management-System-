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
    <title>Single Package</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/package_details.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
 
  
    <style>

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/cover.png");
}
</style>
</head>
<body>

 
<?php

if(isset($message)){

   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


   
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
        <li><a href="booking-history.php">My Booking</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
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
                  <span class="span">P</span>
                  <span class="span">A</span>
                  <span class="span">C</span>
                  <span class="span">K</span>
                  <span class="span">A</span>
                  <span class="span">G</span>
                  <span class="span">E</span>
                  <span >-</span>
                  <span class="span">D</span>
                  <span class="span">E</span>
                  <span class="span">T</span>
                  <span class="span">A</span>
                  <span class="span">I</span>
                  <span class="span">L</span>
                  <span class="span">S</span>
  </h1>
    <p class="ptext">All Amazing Packages</p>
    
  </div>
</div>

<section>
<div class="detiles_container">

<?php
  // Get the product ID from the URL
  $id = mysqli_real_escape_string($conn, $_GET['pak_id']);

  // Fetch the product details
  $query = "SELECT * FROM `packages` WHERE `pak_id` = '$id'";
  $result = mysqli_query($conn, $query);
  
  if(mysqli_num_rows($result) > 0) {
    $package = mysqli_fetch_assoc($result);
?>

<h1 class="location-name"><i class="fa-solid fa-location-dot fa-xs"></i> <?php echo $package['name']; ?></h1>


<div class="row">
  <div class="col-md-4">
<img src="uploaded_img/<?php echo $package['image']; ?>" class="image" alt="<?php echo $package['name']; ?>" width="250"></div>
<div class="col-md-4">
<img src="uploaded_img/<?php echo $package['img']; ?>" class="image"  alt="<?php echo $package['name']; ?>" width="250">
</div></div>
<div class="price_box">
<p class="category"><strong><?php echo $package['category']; ?> :</strong></p>
<h5 class="cap"><strong><?php echo $package['msg']; ?></strong></h5>

<p class="pac_price"><strong><b>Price: </b><?php echo $package['price']; ?>/-</strong></p>

</div>

  <div class="detiles"><p><strong>Notice:</strong> This is an all-inclusive package 1 person.(if you want to add more person and you want stay extra days bill will be added)</p>
  <p>And This Offer Available Only 7 Day's</p>
    <p><strong>Description:</strong> <?php echo $package['offer_pac']; ?></p></div>

  <article class="package-include">
                                 <h3>INCLUDE & EXCLUDE :</h3>
                                 <div class="row">
                                    <div class="col-md-6">
                                 <ul class="fa_check">
                                   <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Specialized bilingual guide</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Hotel</p>
                                    
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Breakfast And Lunch Box</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Entrance Fees</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Private Transport</p></ul>
                                 </div>
                                 <div class="col-md-6">
                                  <ul class="fa_time">
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Room Service Fees</p>
                                   
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Guide Service Fee</p>
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Driver Service Fee</p>
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Any Private Expenses</p>
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i>
                                     Any Alcohol & beverage</p>
                                 </ul>
                                 </div></div>
                              </article>
                          

                              <div class="Additional">
                                <div class="row" id="Additional">
                                  <div class="col-md-4" id="Additional-info">
                                    <h4 class="add-h4"><i class="fa fa-circle-info"></i> Additional Information</h4>
                                    <ul class="add-ul" style="list-style-solid-type:circle;">
                                      <li>
                                      Instant booking
                                      </li>
                                      <li>Wheelchair accessible</li>
                                      <li>Copy of NID card</li>
                                    </ul>
                                  </div>
                                  <div class="col-md-4" id="Travel-Tips">
                                    <h4><i class="fa-solid fa-suitcase"></i> Travel Tips</h4>
                                <ul class="travel-ul" style="list-style-solid-type:circle;">
                                  <li>Must carry drinking water, stay hydrated, travel healthy.</li>
                                  <li>Carry a set of fresh clothing for the travel.</li>
                                  <li>Always be respectful of the rules and guidelines of the tourist spots.</li>
                                  <li>Do not litter, use a disposable bag as a portable trash bin.</li>
                                </ul>
                                </div>
                                </div>
                              </div>

                              <button class="booking_btn" name="book"><a href="offer_book.php?pak_id=<?php echo $package['pak_id'];?>" class="a_btn">Book Now</a></button>

                             <!--- <button class="booking_btn" name="book"><a href="mybook.php?pak_id=<?php echo $package['pak_id'];?>" class="a_btn">Booking</a></button>--->
                              
                              

<?php
  } else {
    echo "<p>Product not found.</p>";
  }
?>


</div>

</section>





<?php
include 'relatedpackage.php';
?>

 
        </div>
    </div>

       <!--===========Footer=================-->
       <div class="footer">
      <div class="container_footer">
      <div class="row">
        <div class="col-md-4">
           <div class="logo_title">Go Tour</div>
      <img src="uploaded_img/logo.png" class="footer_logo" alt="">

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


    
</body>
</html>


