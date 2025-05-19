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
    <link rel="stylesheet" href="viewbook.css">

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
                  <span class="span" >P A C K A G E</span>
                 
  </h1>

        </div>
      </section>



<h1 class="heading-title">Booking Placed</h1>
<section class="booking">
    <div class="container_view">
   

   <?php
    // If there's any message to display
    if(isset($message)){
        foreach($message as $msg){
            echo '<div class="msg"><span>'.$msg.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        }
    }?>
<?php 
                                    $uemail = $_SESSION['id'];
                                    $sql = "SELECT `booking`.BookingId as bookid, 
                                                   booking.name as fname, 
                                       booking.Phone as mnumber,
                                       booking.address as address, 
                                       booking.customer as customer,
                                       booking.payment_method as payment_method,
                                         users.email as email, 
                                        packages.name as p_name,
                                        packages.category as p_type, 
                                        packages.price as p_price, 
                                   booking.PackageId as pid,
                                  
                                   booking.regDate as regDate, 
                                     booking.status as status
                                            FROM `users`
                                            JOIN booking ON booking.email = users.email 
                                            JOIN packages ON packages.pak_id = booking.PackageId 
                                            WHERE `users`.id = ?
                                            ORDER BY `booking`.BookingId DESC LIMIT 1"; // Fetch only the latest booking
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $uemail);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { 
                                            $total_price = $row['p_price'] * $row['customer'];
                                            ?>
            <p>#BookingId: <span class="text"><?php echo htmlspecialchars($row['bookid']); ?> </span></p>
            <p>Name: <span class="text"><?php echo htmlspecialchars($row['fname']); ?> </span></p>
            <p>Email: <span class="text"><?php echo htmlspecialchars($row['email']); ?> </span></p>
            <p>Phone: <span class="text"><?php echo htmlspecialchars($row['mnumber']); ?> </span></p>
            <p>Address: <span class="text"><?php echo htmlspecialchars($row['address']); ?> </span></p>
            <p>Destination: <span class="text"><?php echo htmlspecialchars($row['p_name']); ?> </span></p>
            <p>No. Of Person: <span class="text"><?php echo htmlspecialchars($row['customer']); ?> </span></p>
            <p>Total Price: <span class="text"><?php echo htmlspecialchars($total_price); ?> </span></p>

          
            
            <p>Payment Method: <span class="text"><?php echo htmlspecialchars($row['payment_method']); ?> </span></p>

            <p>Status: <span class="text"><?php  if ($row['status'] == 0) {
                            echo "Pending";
                           } ?> </span></p>



            <button> <a href="payment.php?bkid=<?php echo htmlentities($row['bookid']); ?>">Credit Card Payment</a> </button>
 <!-- Payment Button and Modal -->
 <div class="payment-btn" id="paymentBtn">Online Payment</div>

<!-- Payment Modal -->
<div class="payment-modal" id="paymentModal">
    <div class="payment-modal-content">
        <span class="close-btn" id="closeModal">&times;</span>
        <h4>How to Make an Online Payment</h4>
        <ul style="list-style-solid-type:circle;">
  <li>1.Attach your email id and booking id in the reference.</li>
  <li>2.If payment is not made within 3 hours, the booking will be cancelled.</li>

  <ol>
<li><strong> 1. Bkash:</strong>
 Number- 01798342813 (Select 'Payment' option)

</li>
<li><strong>2. Rocket:</strong>
Biller ID- 9111 (Select 'Bill Pay' option)</li>

<li><strong>4. Nagad:</strong>
Number- 01798342813 </strong></li></ol>
</ul>
<div class="row">
<div class="col"><p class="pay-num"><img src="img/bkash.png" alt="" id="img">
</div>
<div class="col" >
   <p class="pay-num"><img src="img/rocket.png" alt="" id="img">
</div>
<div class="col" >
   <p class="pay-num"><img src="img/nagad.png" alt="" id="img"></div></div>
        
    </div>
</div>

            <?php }
                                    } ?>
   </div>
</section>

<div>
        <div class="summary">
                              <h4 class="bg-title">
                                 <a href="booking-history.php">View Your Booking History</a></h4>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="home.js"></script>
      <script>
    // JavaScript for showing and hiding the modal
    const paymentBtn = document.getElementById('paymentBtn');
    const paymentModal = document.getElementById('paymentModal');
    const closeModal = document.getElementById('closeModal');
    const body = document.body;

    // Show the modal when the payment button is clicked
    paymentBtn.addEventListener('click', () => {
        paymentModal.style.display = 'block';
        body.classList.add('blurred'); // Apply blur effect to the background
    });

    // Close the modal when the close button is clicked
    closeModal.addEventListener('click', () => {
        paymentModal.style.display = 'none';
       
    });

    // Close the modal when clicking outside of the modal content
    window.addEventListener('click', (event) => {
        if (event.target === paymentModal) {
            paymentModal.style.display = 'none';
            
        }
    });
</script>
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
