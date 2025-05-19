<?php
include 'database.php';
if (isset($_POST['submit'])) {
    $pid=intval($_GET['pak_id']);
    $bname = $_POST['fname'];
    $bemail = $_POST['email'];
    $bmobile = $_POST['mnumber'];
    $address = $_POST['address'];
    $status=0;
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $sql = "INSERT INTO booking(PackageId,name,Email, Phone, address ,status, arrivals, leaving) VALUES('$pid','$bname','$bemail', '$bmobile', '$address','$status','$arrivals','$leaving')";
 
    if ($conn->query($sql) === TRUE) {
       $lastInsertId = $conn->insert_id;
       echo "sucessfull";
    } else {
       $error = "Error: " . $sql . "<br>" . $conn->error;
    }
 }

// Calculate date limits
$today = date('Y-m-d');
$maxDate = date('Y-m-d', strtotime('+15 days'));
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

   <!-- Stylesheets -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
   <link rel="stylesheet" href="book.css">

  
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
        maxDate.setDate(today.getDate() + 15);

        if (arrivals < today || arrivals > maxDate || leaving < today || leaving > maxDate || leaving < arrivals) {
            alert('Please select valid dates within the next 15 days.');
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
        maxDate.setDate(today.getDate() + 15);
        toDateInput.setAttribute('max', maxDate.toISOString().split('T')[0]);
    }
</script>

</head>
<body>


   
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
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



<form action="" method="post" class="book-form" onsubmit="return validateDates();">
      <div class="flex">
         <div class="inputBox">
            <span>Name :</span>
            <input type="text" placeholder="Enter your name" name="fname" required>
         </div>
         <div class="inputBox">
      
            <span>Email :</span>
            <input type="email" placeholder="Enter your email" name="email"  required>
         </div>
         <div class="inputBox">
            <span>Phone :</span>
            <input type="number" placeholder="Enter your number" name="mnumber" required>
         </div>
         <div class="inputBox">
            <span>Address :</span>
            <input type="text" placeholder="Enter your address" name="address" required>
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
         <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> Package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> Book</a>
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

</body>
</html>
