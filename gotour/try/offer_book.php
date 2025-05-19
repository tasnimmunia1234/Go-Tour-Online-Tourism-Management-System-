<?php
session_start();
error_reporting(0);
include('database.php'); // Ensure this file contains the connection logic and $conn variable

if (isset($_POST['submit'])) {
    $pid = intval($_GET['pak_id']);
    $bname = $_POST['fname'];
    $bemail = $_POST['email'];
    $bmobile = $_POST['mnumber'];
    $address = $_POST['address'];
    $status = 0;
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $msg = $_POST['msg'];
    $method = $_POST['payment_method'];
    $customer = $_POST['customer'];

    if (!preg_match("/^[0-9]{11}$/", $bmobile)) {
      $error = "Invalid phone number. Please enter a 10-digit number.";
  } else {
      $sql = "INSERT INTO booking (PackageId, name, email, Phone, address, status, arrivals, leaving, msg, payment_method,customer) 
              VALUES ('$pid', '$bname', '$bemail', '$bmobile', '$address', '$status', '$arrivals', '$leaving', '$msg', '$method','$customer')";

   
    if (mysqli_query($conn, $sql)) {
        $lastInsertId = mysqli_insert_id($conn);
        if ($lastInsertId) {
            echo "<script>
                      alert('Booking Successful 😊');
                      window.location.href='viewbooking.php?bid=$lastInsertId&pak_id=" . htmlentities($pid) . "';
                  </script>";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    } else {
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}}
$today = date('Y-m-d',strtotime('+1 days'));
$maxDate = date('Y-m-d', strtotime('+7 days'));
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="asset/booking.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
 
   <style>

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("uploaded_img/cover.png");
}
</style>
<script>
    function validateDates() {
        const arrivals = new Date(document.getElementById('arrivals').value);
        const leaving = new Date(document.getElementById('leaving').value);
        const today = new Date();
        const maxDate = new Date(today);
        maxDate.setDate(today.getDate() + 7);

        if (arrivals < today || arrivals > maxDate || leaving < today || leaving > maxDate || leaving < arrivals) {
            alert('Please select the offer date.');
            return false;
        }

        if (!confirm('Are you sure you want to book this package?')) {
            return false;
        }

        return true;
    }

    function updateToDateMin() {
        const arrivals = document.getElementById('arrivals').value;
        const toDateInput = document.getElementById('leaving');
        const minDate = arrivals ? new Date(arrivals) : new Date();
        minDate.setDate(minDate.getDate() + 1); // Set min date to one day after fromDate
        toDateInput.setAttribute('min', minDate.toISOString().split('T')[0]);

        // Ensure that the selected 'To Date' is within the 15-day range
        const today = new Date();
        const maxDate = new Date(today);
        maxDate.setDate(today.getDate() + 7);
        toDateInput.setAttribute('max', maxDate.toISOString().split('T')[0]);
    }
</script>

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
        <li><a href="booking-history.php">Booking</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    More  Options
  </button>
  <div class="dropdown-menu contain-box" aria-labelledby="dropdownMenu2">
    
    <li><a class="btn btn-info" href="profile.php"><i class="fas fa-user"></i></a></li>
    <li><a class="btn btn-info" href="gallery.php">Gellary</a></li>
    <li><a class="btn btn-info" href="review.php">Review</a></li>
    <li><a class="btn btn-danger" href="dashbord.php">Logout</a></li>
    
  </div>
</div>
    
</nav>


<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px" class="heading">
                  <span class="span" >B</span>
                  <span class="span">O</span>
                  <span class="span">O</span>
                  <span class="span">K</span>
                  <span class="span">I</span>
                  <span class="span">N</span>
                  <span class="span">G</span>
  </h1>
    <p class="ptext">All Amazing Packages</p>
    
  </div>
</div>

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
        <input type="tel" id="mnumber" name="mnumber" pattern="[0-9]{11}" title="Please enter a valid 10-digit phone number" required><br><br>
 </div>
         <div class="inputBox">
            <span>Address :</span>
            <input type="text" placeholder="Enter your address" name="address" required>
         </div>

         <div class="inputBox">
            <span>Customer :</span>
            <input type="number" placeholder="Number of Customer" name="customer" required>
         </div>

         <div class="inputBox">
         <span>Arrivals :</span>
                        <input type="date" id="arrivals" name="arrivals"  required
                            min="<?php echo $today; ?>" max="<?php echo $maxDate; ?>" onchange="updateToDateMin();">
                    </div>
                    <div class="inputBox">
                    <span>Leaving :</span>
                        <input type="date" id="leaving" name="leaving"  required
                            min="<?php echo $today; ?>" max="<?php echo $maxDate; ?>">
                    </div>
                    <div class="inputBox">
            <span>Additional Information :</span>
            <input type="text"  name="msg" required>
         </div>
         <div class="inputBox" id="payment-method">
            <span>Payment Method :</span>
            <select name="payment_method" class="payment">
            <option value="Credit Card">Credit Card</option>
               <option value="Bkash">Bkash</option>
               <option value="Rocket">Rocket</option>
               <option value="Nagad">Nagad</option>
            </select>
         </div>
         
      </div>
      <div class="form-policy">
                                 <h3>Cancellation policy</h3>
                                 <div class="form-group">
                                    <label class="checkbox-list">
                                       <input type="checkbox" name="s" required>
                                       <span class="custom-checkbox"></span>
                                       I accept terms and conditions and general policy.
                                    </label>
                                 </div>
                                 <a><button type="submit" name="submit" class="btn btn-info">SUBMIT</button></a>
                              </div>
   </form>


<div class="row" id="container">
   <div class="col-md-4" id="condition"><p class="condition-text"><strong>*If you use online payment must follow this</strong></p>
<ul style="list-style-solid-type:circle;">
  <li>Attach your email id and booking id in the reference</li>
  <li>If payment is not made within 3 hours, the booking will be cancelled</li>
 
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>
</html>

