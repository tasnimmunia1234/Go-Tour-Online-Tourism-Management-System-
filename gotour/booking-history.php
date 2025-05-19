<?php

session_start(); // Ensure the session is started
error_reporting(0);
include 'database.php';
// Check if user is logged in
if (strlen($_SESSION['email']) == 0) {
	header('location:sign-in.php');
} else {
    // Code for canceling the booking
    if (isset($_REQUEST['bkid'])) {
        $bid = intval($_GET['bkid']);
        $status = 2;
        $cancelby = 'u';

        // Prepared statement for updating the booking status
        $sql = "UPDATE `booking` SET status=?, CancelledBy=? WHERE BookingId=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $status, $cancelby, $bid);
        $stmt->execute();

        echo "<script>
                alert('Booking Cancelled');
                window.location.href='booking-history.php';
              </script>";
    }
}
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
    <title>Booking History</title>
    <link rel="stylesheet" href="booking_history.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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


    <!---  <a class="user_name" href="user_profile.php">
       
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
                  <span class="span" >B O  O K I N G - H I S T O R Y</span>
                 
  </h1>

        </div>
      </section>

                <div class="confirmation-outer">
                    <div class="container">
                        <div class="confirmation-inner">
                            <div class="row">
                                <?php
                                $id = $_SESSION['id'];
                                $sql = "SELECT * FROM `users` WHERE `id` = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // User info display if needed
                                    }
                                }
                                ?>

                                <div class="agile-grids">
                                    <!-- Error or success message -->
                                    <?php if (isset($error)) { ?>
                                        <div class="errorWrap">
                                            <strong>ERROR</strong>: <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } elseif (isset($msg)) { ?>
                                        <div class="succWrap">
                                            <strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } ?>

                                    <!-- Bookings table -->
                                    <div class="agile-tables">
                                        <div class="w3l-table-info">
                                        <table id="table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Name</th>
                                        <th>No. of Person</th>
                                        <th>Email</th>
                                        <th>Total Amount</th>
                                        <th>Package Name</th>
                                        <th>Package Category</th>
                                        <th>Reg Time</th>                                   
                                       
                                        <th>Payment method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $uemail = $_SESSION['id'];
                                    $sql = "SELECT 
                                    booking.BookingId AS bookid, 
                                    booking.name AS fname, 
                                    booking.payment_method AS payment_method, 
                                    booking.customer AS customer, 
                                    booking.confirmtime AS confirmtime,
                                    users.email AS email, 
                                    packages.name AS name, 
                                    packages.category AS p_type, 
                                    packages.price AS p_price, 
                                    pay.BookingTime AS BookingTime, 
                                    booking.PackageId AS pid, 
                                    booking.regDate AS regDate, 
                                    booking.status AS status, 
                                    booking.CancelledBy AS cancelby 
                                FROM 
                                    users 
                                JOIN 
                                    booking ON booking.email = users.email 
                                JOIN 
                                    packages ON packages.pak_id = booking.PackageId 
                                LEFT JOIN 
                                    pay ON booking.BookingId = pay.BookingId 
                                WHERE 
                                    users.id = ?
                                    ORDER BY 
                           booking.BookingId  DESC";
                        

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $uemail);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $total_price = $row['p_price'] * $row['customer'];
                                            ?>
                                            <tr>
                                                <td>#BK-<?php echo htmlentities($row['bookid']); ?></td>
                                                <td><?php echo htmlentities($row['fname']); ?></td>
                                                <td><?php echo htmlentities($row['customer']); ?></td>
                                                <td><?php echo htmlentities($row['email']); ?></td>
                                                <td><?php echo htmlentities($total_price); ?></td>
                                                <td><a class="pak-name" href="package_details.php?pak_id=<?php echo htmlentities($row['pid']); ?>"><?php echo htmlentities($row['name']); ?></a></td>
                                                
                                                <td><?php echo htmlentities($row['p_type']); ?></td>
                                                

    <td><?php echo htmlentities($row['regDate']); ?></td>
                                                <td>
                                    <?php 
                      if ($row['status'] == 2 && $row['cancelby'] == 'a') {
                            echo "Not Payment Done";
                           }
                   elseif ($row['status'] == 2 && $row['cancelby'] == 'u') {
                          echo "Not Payment Yet";
                           }
                         elseif($row['BookingTime']) {
                              echo "Credit Card"; // Show "Credit Card" when BookingTime exists
                       } else {
                           echo htmlentities($row['payment_method']); // Show payment method when BookingTime is NULL
                         }
                              ?>
                               </td>

                                                <td>
                                                    
                                                    <?php
                                                    if ($row['status'] == 0) {
                                                        echo '<p><strong style="color: #0d38f9;">Pending</strong></p>';
                                                    } elseif ($row['status'] == 1) {
                                                        echo '<p><strong style="color: #118804;">Confirmed</strong></p>';
                                                    } elseif ($row['status'] == 2 && $row['cancelby'] == 'a') {
                                                        echo '<p><strong style="color: #ac0002;">Cancelled by admin</strong></p>';
                                                    } elseif ($row['status'] == 2 && $row['cancelby'] == 'u') {
                                                        echo '<p><strong style="color: #ac0002;">Cancelled by you</strong></p>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['status'] == 0) { ?>
                                                        <a href="booking-history.php?bkid=<?php echo htmlentities($row['bookid']); ?>" onclick="return confirm('Do you really want to cancel booking?')" class="btn btn-danger">Cancel</a>
                                                    <?php } else { ?>
                                                        Cancelled
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="10">No Bookings Found</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Other content such as footer -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer and other sections -->
            </section>
        </main>
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


