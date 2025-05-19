<?php
include 'database.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: sign-in.php");
    exit();
}

$userId = $_SESSION['id'];

// Fetch current user data
$sql = "SELECT * FROM `users` WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Email validation function
function is_valid_email($email) {
    $pattern = '/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

// Update profile
if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validate email
    if (!is_valid_email($email)) {
        echo "<script>
                alert('Invalid email address format 😒. Please try again.');
                window.location.href='update-profile.php';
              </script>";
        exit();
    }

    // Check if the email already exists for a different user
    $checkEmail = "SELECT id FROM `users` WHERE email=? AND id!=?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("si", $email, $userId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('This email already exists. Please try a different email 😁');
                window.location.href='update-profile.php';
              </script>";
    } else {
        // Update user information in the database
        $updateQuery = "UPDATE `users` SET name=?, email=? WHERE id=?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssi", $name, $email, $userId);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Profile updated successfully 😊');
                    window.location.href='user_profile.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Something went wrong. Please try again.');
                    window.location.href='update-profile.php';
                  </script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="update_profile.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s;
        }
        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            max-width: 430px;
            width: 100%;
            background-color: #037ec6;
            
        }
        .modal-content h2{
            font-family: monospace;
        }
        .modal-background.show {
            visibility: visible;
            opacity: 1;
        }
        .close-btn {
            font-size: 30px;
            float: right;
            cursor: pointer;
            color:black;
            margin-left:18rem;
            border:solid black;
            border-radius:1rem;
            background-color:#9a3a3a;
            

        }
        .update-profile-form label {
            display: block;
            margin-top: 10px;
        }
        .update-profile-form input[type="text"],
        .update-profile-form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .update-profile-form button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background-color: #105454;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width:40%;
            margin-left:6rem;
        }
        .update-profile-form button:hover {
            background-color: #013038;
            width:40%;
            margin-left:6rem;
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

<body>


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

      <div class="container">
                  <div class="confirmation-inner">
                     <div class="row">
                       
                        <div class="col-lg-8 right-sidebar">
                           <div class="confirmation-details">
                              <h3 class="head">YOUR DETAILS</h3>
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>Name</td>
                                       <td>Update Name</td>
                                    </tr>
                                    <tr>
                                       <td>Email:</td>
                                       <td>Update Email</td>
                                    </tr>
                                    <tr>
                                       <td>Password:</td>
                                       <td>********</td>
                                    </tr>
                                
                                 </tbody>
                              </table>

    </div></div>
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


<!-- Profile Update Modal -->
<div class="modal-background" id="profileModal">
    <div class="modal-content">
        <button class="close-btn" onclick="closeModal()">×</button>
        <h2>Update Profile</h2>
        <form class="update-profile-form" action="update-profile.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <button type="submit" name="update_profile">Update Profile</button>
        </form>
    </div>
</div>

<script>
    // Open the modal
    function openModal() {
        document.getElementById('profileModal').classList.add('show');
    }

    // Close the modal
    function closeModal() {
        document.getElementById('profileModal').classList.remove('show');
        window.location.href = 'user_profile.php';
    }

    // Open modal automatically when page loads
    window.onload = function() {
        openModal();
    };
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
