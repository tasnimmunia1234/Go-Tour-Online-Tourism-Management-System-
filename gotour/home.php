<?php
session_start();
error_reporting(0);
include "database.php";
if (strlen($_SESSION['email']) == 0) {
	header('location:index.php');}
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
    <link rel="stylesheet" href="asset/mhome.css">

    <title>User Dashboard</title>
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


   <!---   <a class="user_name" href="user_profile.php">
       
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
                  
                   echo '<p class="username">Guest</p>';
               }
           } else {
               // Handle case when the user is not logged in (session 'id' is not set)
               ?>
                 
             
               <i class="fa-solid fa-user" id="usericone"></i>
               <?php
              
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
  <a href="home.php" class="navbar-link" data-nav-link>Home</a>
</li>

<li>
  <a href="package.php" class="navbar-link" data-nav-link>Packages</a>
</li>

<li>
  <a href="about.php" class="navbar-link" data-nav-link>About us</a>
</li>

<li>
  <a href="contact.php" class="navbar-link" data-nav-link>Contact us</a>
</li>

<li>
  <a href="booking-history.php" class="navbar-link" data-nav-link>My Booking</a>
</li>

<li><a class="navbar-link" href="user_profile.php">Profile</a></li>
<li>
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


  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore world</h2>

          <p class="hero-text">
          Traveling allows you to experience different parts of the world and immerse yourself in new cultures. You can try new foods, learn new customs, and see things you've never seen before. </p>


        </div>
      </section>

      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">
        <div class="container">

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
          Each of these destinations offers something unique, from natural beauty to deep historical roots, and they’re sure to provide unforgettable experiences.
          </p>

          <ul class="popular-list">

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="img/pic34.jpeg" alt="San miguel, italy" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Bandorban</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="package.php">Jum House</a>
                  </h3>

                  <p class="card-text">
                  Jum House refers to traditional houses used by indigenous people
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="img/popular-2.jpg" alt="Burj khalifa, dubai" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Dubai</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="package.php">Burj khalifa</a>
                  </h3>

                  <p class="card-text">
                  The Burj Khalifa is the world's tallest building, located in Dubai, United Arab Emirates
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="img/popular-3.jpg" alt="Kyoto temple, japan" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Japan</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="package.php">Kyoto temple</a>
                  </h3>

                  <p class="card-text">
                  Kyoto, Japan, is renowned for its rich cultural heritage, and it is home to many beautiful and historically significant temples
                  </p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>


    
<section class="packages">
<h2 class="h2 section-title">Populer Package</h2>
<main class="main">

<?php

$select_packages = mysqli_query($conn, "SELECT * FROM `packages`");
if(mysqli_num_rows($select_packages) > 0){
    
   while($fetch_package = mysqli_fetch_assoc($select_packages)){
    if($fetch_package["category"]=='populer package'){
?>


    <form action="" method="post">
    <div class="card">
        <div class="image">
        <img src="uploaded_img/<?php echo $fetch_package['image']; ?>"  alt="">
        </div>
        <div class="caption">
        <p class="package_name"><i class="fa-solid fa-location-dot"></i> <?php echo $fetch_package['name']; ?></p>
          
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
<button class="seemore-btn"><a href="package.php"> View All Packages</a></button>
    </section>
      <!-- 
        - #GALLERY
      -->
      <section class="gallery" id="gallery">
        <div class="container">
        <h2 class="h2 section-title">Photo Gallery</h2>
          <p class="section-subtitle">Photo's From Travellers</p>

          <ul class="gallery-list">
          <li class="gallery-item">
              <figure class="gallery-image">
                <img src="img/pic10.png" alt="Gallery image">
              </figure>
            </li>
            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="img/pic1.png" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="img/pic3.png" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="img/pic6.png" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="img/pic4.png" alt="">
              </figure>
            </li>

          </ul>
<button class="gallery-btn"> <a href="gallery.php">See More</a></button>
        </div>
      </section>

<section class="service">
<h1 style="font-size:45px">
                <p class="headig-text">S E R V I C E</p>
                
  </h1>
  <div class="box-container">
  <div class="row">
    <div class="col-md-4"><div class="box">
      <i class="fas fa-hotel"></i>
            <h3>Sweetable Hotels</h3>
            <p>We are committed to providing exceptional hotel services within your budget, ensuring you enjoy a memorable and rewarding stay with us, where your satisfaction is our priority!"</p>
       </div></div>
       <div class="col-md-4"> <div class="box">
       <i class="fas fa-car"></i>
            <h3>Transportation</h3>
            <p>Transportation services are a vital part of our Go Tour, ensuring travelers reach their destinations conveniently and comfortably!</p>
       </div></div>
    <div class="col-md-4"><div class="box">
      <i class="fas fa-bullhorn"></i>
            <h3>Safety Guide</h3>
            <p>Safety guide services provided by our Go Tour that designed to ensure the well-being and security of travelers during their journeys. These services aim to minimize risks, provide reliable assistance, and enhance the overall travel experience!</p>
       </div></div>
  </div>
  <div class="row">
    <div class="col-md-4"><div class="box">
      <i class="fas fa-globe-asia" ></i>
            <h3>Around The World</h3>
            <p>Go Tour has bangladeshi and international badget friendly tour packages. You can travle with us around the world.These services often include end-to-end support for international travel!</p>
       </div></div>
    <div class="col-md-4"> <div class="box">
      <i class="fas fa-plane"></i>
            <h3>Fastest Travel</h3>
            <p>Go Tour focused on providing fastest travel services, the offerings could be tailored to cater to travelers seeking quick, efficient, and time-saving travel experiences.!</p>
      </div></div>
    <div class="col-md-4"><div class="box">
      <i class="fas fa-hiking" id="fontasom2"></i>
            <h3>Adventures</h3>
            <p>An adventure-focused Go Tour offers a wide range of thrilling and exciting services for Travelers seeking unique, adrenaline-pumping experiences!</p>
      </div></div>
  </div>
</div>
</section>


 <!-- 
        - #about
      -->
      <section class="about" id="about">
<h2 class="h2 section-title">About US</h2>
<div class="container">
<div class="row"> 

  <div class="col">
    <img src="img/pic10.png" alt="">
  </div>

  <div class="col">
    <h1>Why Choose Us?</h1>
    <p><strong> Amazing Tours A Best Tour Operator And Travel Agent In Bangladesh And International . We Are Tour Package, Hotel Booking. Bangladesh Tours & Travel Agent. Find International And Domestic Tour Packages From Bangladesh At Low Prices Including Best ... Couple Package | Family Package | International Package | Group Packge <br>
    Very Good Communication. Friendly And Easy To Deal With.</strong></p>
  </div>
</div></div>
</section>


      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
            Traveling allows you to experience different parts of the world and immerse yourself in new cultures. You can try new foods.
            </p>
          </div>

          <button class="btn"><a href="contact.php"> Contact Us !</a></button>

        </div>
      </section>

    </article>
  </main>





       <!--===========Footer=================-->
     
<div class="footer">
<div class="cotainer">
    <div class="row">
        <div class="col-md-4"><div class="logo_title">Go Tour</div>
      <img src="img/logo.png" class="footer_logo" alt="">

      <p class="footer_text">Traveling allows you to experience different parts of the world and immerse yourself in new cultures. You can try new foods, learn new customs, and see things you've never seen before.Here Go Tour is a leading tour operator of Bangladesh.Go Tour offer inbound and outbound tour for Traveler.</p>
    </div>

        <div class="col-md-4"><div class="box-container">
        <div class="box">
         <h3>Quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="user_profile.php"> <i class="fas fa-angle-right"></i> Profile</a>
         <a href="gallery.php"> <i class="fas fa-angle-right"></i> Gallery</a>
         <a href="service_review.php"> <i class="fas fa-angle-right"></i> Review</a>
         <a href="term_condition.php"> <i class="fas fa-angle-right"></i> Terms of use</a>
      </div>
    </div></div>
        <div class="col-md-4"><div class="contact_box">
         <h3>Contact Info</h3>
         <p class="contacr_info"><i class="fas fa-phone"></i> +880-1517-089144</p>
         <p class="contacr_info"><i class="fas fa-phone"></i> +111-2222-333333</p>
         <p class="contacr_info"><i class="fas fa-envelope"></i> munia19800@gmail.com</p>
         <p class="contacr_info"><i class="fas fa-location"></i> Dhaka, Bangladesh - 1215</p>
        
         
      </div>
    </div>
    </div>
</div>
<div class="credit"> Copyright © 2024 Go Tour | all rights reserved!</div>
</div>

    <a href="#top" class="go-top" data-go-top>
    <i class="fa-solid fa-angles-up"></i>
  </a>
  <script src="home.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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

