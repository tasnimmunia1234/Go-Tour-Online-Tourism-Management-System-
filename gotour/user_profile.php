<?php
session_start();
error_reporting(0);
include "database.php";
if (strlen($_SESSION['email']) == 0) {
	header('location:index.php');}
include "change_password.php";
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
    <link rel="stylesheet" href="user_profile.css">

    <title>User Profile</title>
     <style>
      /* Style for the popup window */
      .popup {
         display: none;
         position: fixed;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0, 0, 0, .5);
         z-index: 9999;
      }

      .popup-content {
         background-color: #fefefe;
         margin: 10% auto;
         padding: 30px;
         border: 1px solid #888;
         width: 410px;
         border-radius: 10px;
      }

      .close {
         float: right;
         font-size: 25px;
         font-weight: bold;
         cursor: pointer;
      }

      .close:hover {
         color: red;
      }

     .changepss {
         width: 100%;
         background-color:rgb(104, 149, 188);
         padding:.5rem;
         border-radius:1rem;
         color:black;

      }
   
      @media only screen and (max-width: 600px) {
         .popup-content {
            max-width: 100%;
         }

         .popup-content input {
            width: 100%;
         }
      }
   </style>
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
                  <span class="span" >P R O F I L E</span>
                 
  </h1>

        </div>
      </section>

<div class="confirmation-outer">
               <div class="container">
                  <div class="confirmation-inner">
                     <div class="row">
                        <?php
                        // Use MySQLi for database operations
                        $id = $_SESSION['id'];
                        $sql = "SELECT * FROM `users` WHERE id = $id";
                        $query = mysqli_query($conn, $sql); // $dbh should be the connection from 'config.php'

                        if (mysqli_num_rows($query) > 0) {
                           while ($result = mysqli_fetch_assoc($query)) {
                        ?>
                        <div class="col-lg-8 right-sidebar">
                           <div class="confirmation-details">
                              <h3 class="head">YOUR DETAILS</h3>
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>Name</td>
                                       <td><?php echo htmlentities($result['name']); ?></td>
                                    </tr>
                                    <tr>
                                       <td>Email:</td>
                                       <td><?php echo htmlentities($result['email']); ?></td>
                                    </tr>
                                    <tr>
                                       <td>Password:</td>
                                       <td>********</td>
                                    </tr>
                                    
                                    <tr>
                                       <td>Registration Date:</td>
                                       <td><?php echo htmlentities($result['RegDate']); ?></td>
                                    </tr>
                                 </tbody>
                              </table>

                              <!-- The popup window for changing the password -->
                              <div id="popup" class="popup">
                                 <div class="popup-content">
                                    <span class="close" onclick="closePopup()">&times;</span>
                                    <h4>Change Password</h4>
                                    <form method="POST" action="">
                                       <input class="changepss" type="password" id="currentPassword" name="currentPassword" placeholder="Current Password" required><br>
                                       <input type="checkbox" class="show_pass" onclick="togglePassword('currentPassword')" /> Show Password
                       
                                       <br><br>
                                       <input class="changepss" type="password" id="newPassword" name="newPassword" placeholder="New Password" required><br>
                                       <input type="checkbox" class="show_pass" onclick="togglePassword('newPassword')" /> Show Password
                       
                                       <br><br>
                                       <input class="changepss" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required><br>
                                       <input type="checkbox" class="show_pass" onclick="togglePassword('confirmPassword')" /> Show Password
                       
                                       <br><br>
                                       <input type="submit" value="Submit" name="submit">
                                    </form>
                                 </div>
                              </div>
            
                              <a onclick="openPopup()"><button class="outline-btn outline-btn-blue">Change Password</button></a>
                               
                              <a  href="update-profile.php?id=<?php echo $result['id']; ?>"><button class="outline-btn">Update Profile</button></a>
                                     </div>
                        </div>
                        <?php
                           }
                        } else {
                           echo "<p>No user data found.</p>";
                        }
                        ?>
                        <div class="col-lg-4">
                           <div class="summary">
                              <h4 class="bg-title">
                                 <a class="view-book" href="booking-history.php">View Your Bookings</a>
                              </h4>
                           </div>
                           <div class="help">
                              <div class="icon">
                                 <i class="fas fa-phone" id="fontasom"></i>
                              </div>
                              <div class="support-content">
                                 <h5>HELP AND SUPPORT</h5>
                                 <a href="telto:12345678" class="phone">+91 8126XXXXXX</a><br>
                                 <small>Monday to Friday 9.00am - 7.30pm</small>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-img" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(img/cover.png);">
            
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="callback-content">
                           <h2 class="section-title">ARE YOU READY TO TRAVEL? REMEMBER US !!</h2>
                           <p class="section-text">Traveling allows you to experience different parts of the world and immerse yourself in new cultures. You can try new foods, learn new customs, and see things you've never seen before.</p>
                           <div class="callback-btn">
                              <a href="package.php" class="round-btn">View Packages</a>
                              <a href="about.php" class="more-btn outline-btn-white">Learn More</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>

     
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
         <a href="review.php"> <i class="fas fa-angle-right"></i> Review</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

      <script>
      function openPopup() {
         document.getElementById("popup").style.display = "block";
      }

      function closePopup() {
         document.getElementById("popup").style.display = "none";
      }
   </script>

<script>
    function togglePassword(fieldId) {
        var passwordField = document.getElementById(fieldId);
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
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