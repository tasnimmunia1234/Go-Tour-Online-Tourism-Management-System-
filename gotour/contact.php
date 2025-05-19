<?php
session_start();
error_reporting(0);
include 'database.php';

if (isset($_POST['add_sms'])) {
    $p_name = htmlspecialchars($_POST['name']); // Using htmlspecialchars for sanitizing user input
    $email = htmlspecialchars($_POST['email']);
    $masg = htmlspecialchars($_POST['masg']);

    $errors = array();

    if (empty($p_name) || empty($email) || empty($masg)) {
        $errors[] = "All fields are required";
    } else {
        // Prepared statement for secure SQL insertion
        $stmt = $conn->prepare("INSERT INTO `massage`(name, email, masg) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $p_name, $email, $masg);

        if ($stmt->execute()) {
            $message[] = 'Message/question sent successfully';
        } else {
            $message[] = 'Could not send the message';
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="asset/contact.css">
    
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
                  <span class="span" >CONTACT -  US</span>
                 
  </h1>

        </div>
      </section>
<section>

<div class="container" id="container">
<div class="row">
    <div class="col-md-6"><div class="section-heading">
                           <h5 class="sub-title">GET IN TOUCH</h5>
                           <h2 class="section-title">REACH & CONTACT US!</h2><br>
                           <br>
                           <p>We value your feedback and are here to assist you. Whether you have a question, suggestion, or need support, feel free to reach out to our dedicated team. We strive to provide prompt and helpful responses to all inquiries. You can get in touch with us.</p>
                           <div class="social-icon">
                           <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top"  class="tooltips" href="" data-original-title="Facebook"><i class="fa-brands fa-facebook fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top"  class="tooltips" href="" data-original-title="Twitter"><i class="fa-brands fa-x-twitter fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top"  class="tooltips" href="" data-original-title="Whatsapp"><i class="fa-brands fa-whatsapp fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top"  class="tooltips" href="" data-original-title="instragram"><i class="fa-brands fa-instagram fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                        </ul>      
                           </div>
                        
                        
                        </div></div>

                       
                     <div class="col-md-6">
     <div class="container" id="form_container">
    
    <form action="" method="post" class="add-contact-form" enctype="multipart/form-data"> 
    <h4 class="head">Send Massage</h4>
   
    <div class="form-group">

    <?php
    if (isset($_SESSION['id'])) {
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                                $sql = "SELECT * FROM users WHERE id = $id";
                                $result = mysqli_query($conn, $sql);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    ?>

            <span>Name :</span>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" readonly> </div>
         <div class="inputBox">
      
                                       <div class="form-group">
                                       <span>Email :</span>
                                       <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" readonly>
                                  </div>
                                       <?php
                                          }
                                       }}else {
                                       ?>
                                        <span>Name :</span>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name*" required>
                                <span>Email :</span>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email*" required>
                                <?php
                            }
                            ?>
   <!-- <i class="fa-solid fa-user"></i>
    <label for="name"> Name</label>
        <input type="text" name="name" placeholder="  Enter your name*" class="box" require>
          </div>

          <div class="form-group">
          <i class="fa-solid fa-envelope"></i>
         <label for="enail"> Email</label>
        <input type="email" name="email" min="0" placeholder="  Enter your email" class="box" require>-->
      </div>

      <div class="form-group">
          <i class="fa-solid fa-message"></i>
         <label for="enail"> Massage</label>
        <textarea type="text" name="masg"  placeholder="  Send the massage" 
        class="masg" require></textarea>
        <div>
       
        <button type="submit" name="add_sms"  class="send_btn" require> <i class="fa-solid fa-paper-plane" id="button"></i> Send</button>
        </div>
    </form>

</div>
            </div>
    </div>
</div>
</div>

</section>
<div class="contact-details-section bg-light-grey">
               <div  id="box">
                  <div class="row align-items-center">
                     <div class="col" id="col">
                        <div class="icon-box border-icon-box">
                           <div class="box-icon">
                           <i class="fa-solid fa-envelope-open-text fa-2xl" id="icon"></i>
                           </div>
                           <div class="icon-box-content">
                              <h4>EMAIL ADDRESS</h4>
                              <ul>
                                 <li>
                                    <a href="mailto:support@gmail.com">tasnimmunia1234@gmail.com</a>
                                 </li>
                                 <li>
                                    <a href="mailto:name@comapny.com">tasnim@gmail.com</a>
                                 </li>
                                 <li>
                                    <a href="mailto:info@domain.com">munia123@gmail.com</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col" id="col">
                        <div class="icon-box border-icon-box">
                           <div class="box-icon">
                           <i class="fa-solid fa-phone fa-2xl" id="icon"></i>
                           </div>
                           <div class="icon-box-content">
                              <h4>PHONE NUMBER</h4>
                              <ul>
                                 <li>
                                    <p>+88 019 254669</p>
                                 </li>
                                 <li>
                                    <p>+88 019 255587</p>
                                 </li>
                                 <li>
                                    <p>+88 017 259912</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col" id="col">
                        <div class="icon-box border-icon-box">
                           <div class="box-icon">
                           <i class="fa-solid fa-location-dot fa-2xl" id="icon"></i>
                           </div>
                           <div class="icon-box-content">
                              <h4>ADDRESS LOCATION</h4>
                              <ul>
                                 <li>
                                    3146 Rampura Dhaka
                                 </li>
                                 <li>
                                    Flat 42
                                 </li>
                                 <li>
                                    36 Street, DRD
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
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
          <div class="box_links">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

