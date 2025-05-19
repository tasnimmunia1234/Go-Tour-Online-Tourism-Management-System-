<?php
session_start();
error_reporting(0);
include('database.php'); // Ensure this file contains the connection logic and $conn variable
if (strlen($_SESSION['email']) == 0) {
	header('location:sign-in.php');}
if (isset($_POST['submit'])) {
    $pid = intval($_GET['pak_id']);
    $bname = $_POST['fname'];
    $bemail = $_POST['email'];
    $bmobile = $_POST['mnumber'];
    $address = $_POST['address'];
    $status = 0;
   
    $msg = $_POST['msg'];
    $method = $_POST['payment_method'];
    $customer = $_POST['customer'];

    if (!preg_match("/^[0-9]{11}$/", $bmobile)) {
      $error = "Invalid phone number. Please enter a 10-digit number.";
  } else {
      $sql = "INSERT INTO booking (PackageId, name, email, Phone, address, status,  msg, payment_method,customer) 
              VALUES ('$pid', '$bname', '$bemail', '$bmobile', '$address', '$status',  '$msg', '$method','$customer')";

   
    if (mysqli_query($conn, $sql)) {
        $lastInsertId = mysqli_insert_id($conn);
        if ($lastInsertId) {
            echo "<script>
            
            alert('Complete your payment by given payment method 😊');
                      window.location.href='viewbooking.php?bid=$lastInsertId&pak_id=" . htmlentities($pid) . "';
                  </script>";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    } else {
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}}

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  
   <link rel="stylesheet" href="booking.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
 
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

<li><a class="navbar-link" href="logout.php" id="logout-btn">Logout</a></li>

<!-- Logout Confirmation Modal -->
<div id="logout-modal" class="logout-modal">
    <div class="logout-content">
        <p>Are you sure you want to log out?</p>
        <button onclick="confirmLogout()" class="confirm-btn">Yes</button>
        <button onclick="cancelLogout()" class="cancel-btn">No</button>
    </div>
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
                  <span class="span" >B O O K I N G</span>
                 
  </h1>

        </div>
      </section>

<section class="booking">
   <h1 class="heading-title">Book Your Trip!</h1>

   <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="msg"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<div class="container_summary">
 <h4>Summary</h4>
 <p>
            <?php
            // Fetch the package name associated with the booking
            $id = mysqli_real_escape_string($conn, $_GET['pak_id']);
            $packageQuery = "SELECT * FROM `packages` WHERE `pak_id` = '$id'";
            $packageResult = mysqli_query($conn, $packageQuery);

            if (mysqli_num_rows($packageResult) > 0) {
                $packageData = mysqli_fetch_assoc($packageResult);
                ?>
                <div class="inputBox">
            
            <p><strong><span>Destinatio: </span></strong><?php echo htmlspecialchars($packageData['name']); ?> </p>
         </div>
         <div class="inputBox">
            
            <p><strong><span>Category: </span></strong><?php echo htmlspecialchars($packageData['category']); ?> </p>
         </div>
                <div class="inputBox">
            <p><strong> <span>Price: </span></strong><?php echo htmlspecialchars($packageData['price']); ?> (Per Person)<p>
         </div>
        
                <?php
            } else {
                echo "<span>Package not found.</span>";
            }
            ?>
            </p>
            </div>

<form action="" method="post" class="book-form" onsubmit="return validateDates();">
      <div class="flex">
         <div class="inputBox">


         <?php
                                       $id = $_SESSION['id']; // Ensure that 'id' is stored in the session
                                       $sql = "SELECT * FROM users WHERE id=$id";
                                       $result = mysqli_query($conn, $sql);
                                       if (mysqli_num_rows($result) > 0) {
                                          while ($row = mysqli_fetch_assoc($result)) {
                                       ?>
            <span>Name :</span>
            <input type="text" placeholder="Enter your name" class="form-control"  name="fname" value="<?php echo htmlentities($row['name']); ?>" readonly>
         </div>
         <div class="inputBox">
      
                                       <div class="form-group">
                                       <span>Email :</span>
                                          <input type="email" class="form-control" name="email" value="<?php echo htmlentities($row['email']); ?>" readonly>
                                       </div>
                                       <?php
                                          }
                                       }
                                       ?>
                                     </div>
         <div class="inputBox">
            <span>Phone :</span>
        <input type="tel" id="mnumber" name="mnumber" pattern="[0-9]{11}" title="Please enter a valid 11-digit phone number" required><br><br>
 </div>
         <div class="inputBox">
            <span>Address :</span>
            <input type="text" placeholder="Enter your address" name="address" required>
         </div>

         <div class="inputBox">
            <span>Person :</span>
            <input type="number" placeholder="Number of Person" name="customer" min="1" max="10" required>
         </div>

        
                    <div class="inputBox">
            <span>Additional Information :</span>
            <input type="text"  name="msg" >
         </div>
         <div class="inputBox" id="payment-method">
            <span>Payment Method :</span>
            <select name="payment_method" class="payment">
            <option value="#">----Select Catagory----</option>
            <option value="Credit Card">Credit Card</option>
               <option value="Bkash">Bkash</option>
               <option value="Rocket">Rocket</option>
               <option value="Nagad">Nagad</option>
            </select>
         </div>
         
      </div>
      <div class="form-policy">
                                 
                                 <a><button type="submit" name="submit" class="btn btn-info">SUBMIT</button></a>
                              </div>
   </form>



<div class="row" id="container">
   <div class="col-md-4" id="condition"><p class="condition-text"><strong>*If you use online payment must follow this</strong></p>
<ul style="list-style-solid-type:circle;">
  <li>1.Attach your email id and booking id in the reference.</li>
  <li>2.If payment is not made within 12 hours, the booking will be cancelled</li>
 
</ul></div>
<div class="col" >
   <p class="pay-num"><img src="img/bkash.png" alt="" id="img"><br>
01798342813</p>
</div>
<div class="col" >
   <p class="pay-num"><img src="img/rocket.png" alt="" id="img"><br>
         Biller ID-9111</p>
</div>
<div class="col" >
   <p class="pay-num"><img src="img/nagad.png" alt="" id="img"><br>
01798342813</p>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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


