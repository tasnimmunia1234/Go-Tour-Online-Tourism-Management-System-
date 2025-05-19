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
    <link rel="stylesheet" href="asset/mainhome.css">

    <title>User Dashboard</title>
</head>

<!---<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourly - Travel agancy</title>


  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

 k rel="stylesheet" href="home.css">

 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>-->

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
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+01 (123) 4567 90</p>
          </div>

        </a>
        <a href="#" class="logo">
        <img src="img/logo.png" class="header_logo" alt="">
        </a>
    
        <a href="#" class="logo">
        <?php
                        // Use MySQLi for database operations
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM `users` WHERE id = $id";
                        $query = mysqli_query($conn, $sql); // $dbh should be the connection from 'config.php'

                        if (mysqli_num_rows($query) > 0) {
                           while ($result = mysqli_fetch_assoc($query)) {
                        ?>
 

<i class="fa-solid fa-user" id="usericone"></i>
<p class="username"><?php echo ($result['name']);?></p>

<?php

                           }}?>
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
      <div class="logo-title">Go Tour</div>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>
<!---
          <ul class="menu">
        <li><a href="main.php">Home</a></li>
        <li><a href="package.php">Packages</a></li>
        <li><a href="viewbook.php">My Booking</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    More  Options
  </button>
  <div class="dropdown-menu contain-box" aria-labelledby="dropdownMenu2">
    
    <li><a class="btn btn-info " href="user_profile.php"><i class="fas fa-user"></i></a></li>
    <li><a class="btn btn-info" href="gallery.php">Gellary</a></li>
    <li><a class="btn btn-info" href="review.php">Review</a></li>
    <li><a class="btn btn-danger" href="dashbord.php">Logout</a></li>
    
  </div>
</div>
</ul>
--->

<ul class="navbar-list">

<li>
  <a href="main.php" class="navbar-link" data-nav-link>home</a>
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


<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    More  Options
  </button>
  <div class="dropdown-menu contain-box" aria-labelledby="dropdownMenu2">
    
    <li><a class="btn btn-info" id ="profile-btn" href="user_profile.php"><i class="fas fa-user"></i></a></li>
    <li><a class="btn btn-info" href="gallery.php">Gellary</a></li>
    <li><a class="btn btn-info" href="review.php">Review</a></li>
    <li><a class="btn btn-dagner" href="dashbord.php">Logout</a></li>
    
  </div>
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
                    <a href="#">Jum Ghor</a>
                  </h3>

                  <p class="card-text">
                    Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
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
                    <a href="#">Burj khalifa</a>
                  </h3>

                  <p class="card-text">
                    Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
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
                    <a href="#">Kyoto temple</a>
                  </h3>

                  <p class="card-text">
                    Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
                  </p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>


      <!-- 
        - #PACKAGE
      -->
<!--
      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Popular Packeges</p>

          <h2 class="h2 section-title">Checkout Our Packeges</h2>

          <p class="section-text">
            Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium.
            Sit ornare
            mollitia tenetur, aptent.
          </p>

          <ul class="package-list">

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="img/pic4.png" alt="Experience The Great Holiday On Beach" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Experience The Great Holiday On Beach</h3>

                  <p class="card-text">
                    Laoreet, voluptatum nihil dolor esse quaerat mattis explicabo maiores, est aliquet porttitor! Eaque,
                    cras, aspernatur.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Malaysia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(25 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $750
                    <span>/ per person</span>
                  </p>

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="img/pic3.png" alt="Summer Holiday To The Oxolotan River" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Summer Holiday To The Oxolotan River</h3>

                  <p class="card-text">
                    Laoreet, voluptatum nihil dolor esse quaerat mattis explicabo maiores, est aliquet porttitor! Eaque,
                    cras, aspernatur.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Malaysia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(20 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $520
                    <span>/ per person</span>
                  </p>

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="img/pic1.png" alt="Santorini Island's Weekend Vacation" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Santorini Island's Weekend Vacation</h3>

                  <p class="card-text">
                    Laoreet, voluptatum nihil dolor esse quaerat mattis explicabo maiores, est aliquet porttitor! Eaque,
                    cras, aspernatur.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Malaysia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(40 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $660
                    <span>/ per person</span>
                  </p>

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>

          </ul>

          <button class="btn btn-primary">View All Packages</button>

        </div>
      </section>
--->

<!--
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
--->


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
            <h3>Affordable Aotels</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
       </div></div>
    <div class="col-md-4"> <div class="box">
      <i class="fas fa-utensils"></i>
            <h3>Food And Drinks</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
       </div></div>
    <div class="col-md-4"><div class="box">
      <i class="fas fa-bullhorn"></i>
            <h3>Safty Guide</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
       </div></div>
  </div>
  <div class="row">
    <div class="col-md-4"><div class="box">
      <i class="fas fa-globe-asia" ></i>
            <h3>Around The World</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
       </div></div>
    <div class="col-md-4"> <div class="box">
      <i class="fas fa-plane"></i>
            <h3>Fastest Travel</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
      </div></div>
    <div class="col-md-4"><div class="box">
      <i class="fas fa-hiking" id="fontasom2"></i>
            <h3>Adventures</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
      </div></div>
  </div>
</div>
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
         <a href="review.php"> <i class="fas fa-angle-right"></i> Review</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Terms of use</a>
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
<div class="credit"><span> Copyright © 2024 Go Tour. </span> | all rights reserved!</div>
</div>

    <a href="#top" class="go-top" data-go-top>
    <i class="fa-solid fa-angles-up"></i>
  </a>
  <script src="home.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

