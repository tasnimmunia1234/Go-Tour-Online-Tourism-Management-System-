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
    <link rel="stylesheet" href="package_details.css">

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
<style>
        /* Basic styles for the modal and blur effect */
        body.modal-open {
            overflow: hidden;
            
        }

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 100; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black background with transparency */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: rgb(89, 124, 155);
            padding: 20px;
            border-radius: 1rem;
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-content ul {
            list-style-type: circle;
            padding-left: 20px;
        }

        .modal-content li {
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .close-btn {
            background-color: black;
            color: white;
            margin-left:40rem;
            border: none;
            border-radius:1rem;
            cursor: pointer;
            float: right;
        }
        .How_to_book{
          padding: .4rem;
          border:solid;
          border-radius:1rem;
          background-color: black;
          color:white;
          margin-left:1rem;
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

<?php if (isset($_SESSION['id'])): ?>
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
    <li>
<a href="index.php" class="navbar-link" data-nav-link>home</a>
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
<a href="sign-in.php" class="signin-btn" data-nav-link>Sign-in</a>
</li>

<button id="showInstructionsBtn" class="How_to_book">How to Book</button>
<?php endif; ?>


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
                  <span class="span" >P A C K A G E - D E T A I L S</span>
                 
  </h1>

        </div>
      </section>

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

  <div class="detiles">
  <p><strong>Notice:</strong> This is an all-inclusive package 1 person.(if you want to add more person and you want stay extra days bill will be added). And 
to carry your Copy of NID card</p>
  <p><strong> Description:</strong> <?php echo $package['offer_pac']; ?></p></div>

  <article class="package-include">
                                 <h3>INCLUDE & EXCLUDE :</h3>
                                 <div class="row">
                                    <div class="col-md-6">
                                 <ul class="fa_check">
                                   <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Specialized bilingual guide</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Hotel</p>
                                    
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Breakfast And Lunch Box</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Entrance Fees</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Return Airport – Hotel – Airport Pickup and Drop Transfer</p>
                                    <p><i class="fa-solid fa-check" style="color: #2fca42;"></i>  Domestic Air Ticket included as per Tour</p></ul>
                                   
                                 </div>
                                 <div class="col-md-6">
                                  <ul class="fa_time">
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Room Service Fees</p>
                                   
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Guide Service Fee</p>
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Driver Service Fee</p>
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Any Private Expenses</p>
                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i>
                                     Any Alcohol & beverage</p>

                                    <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Visa Fee</p>
                                 </ul>
                                 </div></div>
                              </article>
                          

                              <div class="Additional">
                                <div class="row" id="Additional">
                                  <div class="col-md-4" id="Additional-info">
                                    <h4 class="add-h4"><i class="fa fa-circle-info"></i> Additional For International Travle:</h4>
                                    <ul class="add-ul" style="list-style-solid-type:circle;">
                                      <li>
                                      Hotel Accommodation in that place
                                      </li>
                                      <li>Wheelchair accessible</li>
                                      
                                      <li>Visa on arrival </li>
                                      <li>Airport hotel pick n drop PVT</li>
                                     <li> Entrance fees mentioned by the itinerary </li>
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

                              <button class="booking_btn" name="book"><a href="booking.php?pak_id=<?php echo $package['pak_id'];?>" class="a_btn">Book Now</a></button>

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

<!-- The Modal -->
<div id="bookingModal" class="modal">
    <div class="modal-content">
      <h4>How to booking</h4>
        <button class="close-btn" id="closeModalBtn">X</button>
        <ul>
            <li><strong>1. Registration (for new users)</strong></li>
            <li><strong>2. Login with email and password</strong></li>
            <li><strong>3. Click on Package</strong></li>
            <li><strong>4. Choose package, see the details, and click on Book now</strong></li>
            <li><strong>5. Fill up the booking form</strong></li>
            <li><strong>6. See the payment process and follow the process</strong></li>
            <li><strong>7. Click the My Booking and see your booking details</strong></li>
        </ul>
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
<script>
    // Get the modal, button, and close elements
    var modal = document.getElementById("bookingModal");
    var showInstructionsBtn = document.getElementById("showInstructionsBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");
    
    // When the button is clicked, show the modal and blur the background
    showInstructionsBtn.onclick = function() {
        modal.style.display = "flex";
        document.body.classList.add("modal-open");
    }

    // When the close button is clicked, hide the modal and remove the blur
    closeModalBtn.onclick = function() {
        modal.style.display = "none";
        document.body.classList.remove("modal-open");
    }

    // Hide the modal if the user clicks outside the content
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.classList.remove("modal-open");
        }
    }
</script>
</body>
</html>


