<?php
session_start();
error_reporting(0);
include('database.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if new password is at least 8 characters long
    if (strlen($newpassword) < 8) {
        echo "<script>
            alert(' Sorry Password must be at least 8 characters long.');
            window.location.href='sign-in.php';
            </script>";
        exit;
    } 

    // Check if new password matches confirmation
    if ($newpassword !== $confirmpassword) {
        echo "<script>
            alert('Passwords do not match 😒');
            window.location.href='sign-in.php';
            </script>";
        exit;
    }

    // Check if email exists
    $email = $conn->real_escape_string($email);
    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hash new password
        $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);

        // Update password in the database
        $update_sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
        if ($conn->query($update_sql) === TRUE) {
            echo "<script>
                alert('Password Changed Successfully 😊');
                window.location.href='sign-in.php';
                </script>";
        } else {
            echo "<script>
                alert('Error updating password 😞');
                window.location.href='sign-in.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Email Id Is Invalid 😒');
            window.location.href='sign-in.php';
            </script>";
    }
    
    // Close connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
          

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Tour</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="sign-in.css">
   
    <style>
        /* Css for forgot password */
        /* Style for the popup window */
    .popup {
  display: none; /* Hide the popup by default */
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.popup-content {
  background-color: #ffffff;
  margin: 10% auto;
  padding: 20px;
  max-width: 350px;
  border-radius: 7px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
}

h2 {
  margin: 10px 0 20px 0;
}

form {
  margin-top: 20px;
}

label {
  display: block;
  font-weight: bold;
    margin-bottom: 10px;
}

input[type="email"],
input[type="password"],
input[type="submit"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 7px;
  background-color: #eee;
}

input[type="submit"] {
  background-color: #008ecf;
  color: white;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #1db8ff;
}

</style>
    
    <style>
    /* Import Google font - Poppins */
/* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap'); */
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
 font-family: 'Montserrat', sans-serif;
}

.container{
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 380px;
  width: 100%;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(1,0,0,0.3);
  
}
.container .registration{
  display: none;
  
}
#check:checked ~ .registration{
  display: block;
}
#check:checked ~ .login{
  display: none;
}
#check{
  display: none;
}
.container .form{
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  padding-bottom: 1.5rem;
}
.form header{
  font-size: 2rem;
  font-weight: 700;
  text-align: center;
  margin-top:1rem
}
 .form .form_group{
   /* height: 60px; */
   width: 100%;
   padding: 12px 15px;
   font-size: 17px;
   margin-bottom: 1.5rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
  
  
 }
 .form input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  font-size: 16px;
  color: #008ecf;
  text-decoration: none;
}
.form a:hover{
  text-decoration: underline;
}

.signup{
  font-size: 17px;
  text-align: center;
}
.signup label{
  color: #008ecf;
  cursor: pointer;
}
.signup label:hover{
  text-decoration: underline;
}
button {
            border-radius: 6px;
            box-shadow: 0 1px 1px;
            border: 1px solid #008ecf;
            background: #008ecf;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            margin: 15px 0 15px 0;
            width: 100%;
            cursor:pointer;
        }

        button:active {
            transform: scale(.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }
        /* Animated Wave Background Style  */
         html,
        body {
            width: 100%;
            height: 100%;
        }

        
body{
    margin: 0px;
    padding: 0px;
  
}
body{
    background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url('asset/img/pic10.png');
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    height: 850px;
}


    </style>


</head>

<body>
<nav class="navbar sticky-top navbar-expand-lg ">

    <div class="logo-title">Go Tour</div>
    <div class="menu">
        <div class="flex-container">
<div>
  <a href="index.php" class="navbar-link" data-nav-link>home</a>

  </div>
<div>
  <a href="package.php" class="navbar-link" data-nav-link>packages</a>
  </div>

<div>
  <a href="about.php" class="navbar-link" data-nav-link>about us</a>
  </div>

<div>
  <a href="contact.php" class="navbar-link" data-nav-link>contact us</a>
  </div>


<!-- Logout Confirmation Modal -->
<a class="btn btn-sm btn-info" id="back" href="index.php"><i class="fas fa-home"></i> Back</a>
    
</div>
</div>
    
</nav>
    <!-- Log In Form Section -->
    <section>
   
    <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Log In</header>
      <form action="process.php" method="POST">
        <input class="form_group" name="email" type="email" placeholder="Email" required />
        <input class="form_group" name="password" type="password" placeholder="Password" id="password" required />
       
        <input type="checkbox" onclick="togglePassword('password')" class="show_pass"> Show Password
          <br>
          <br>
        <a style="cursor:pointer;" onclick="openPopup()">Forgot password?</a><br>
        <button name="login">Log In</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    
    <div class="registration form">
                <header>Sign Up</header>
                <form action="process.php" method="POST">
                    <input class="form_group" name="name" type="text" placeholder="Name" required />
                    <input class="form_group" name="email" type="email" placeholder="Email" required />

                    
                    <input class="form_group" name="password" type="password" placeholder="Password" id="password_signup" minlength="8"   required />
                    <input type="checkbox" class="show_pass" onclick="togglePassword('password_signup')" /> Show Password

                    <input class="form_group" name="cpassword" type="password" placeholder="Confirm Password" id="cpassword_signup" minlength="8"  required />
                    <input type="checkbox" class="show_pass" onclick="togglePassword('cpassword_signup')" /> Show Password
                    <button name="signup">Sign Up</button>
                </form>
                <div class="signup">
                    <span>Already have an account? <label for="check">Login</label></span>
                </div>
            </div>
  </div>
    </section>
    <!-- The popup window -->
            <div id="popup" class="popup">
                <div class="popup-content">
                    <span class="close" onclick="closePopup()">&times;</span>
                    <h2>Forgot Password</h2>

                    <form method="POST" action="">
                        
                        <input type="email" name="email" class="form-control" id="email" placeholder="Reg Email id" required>

                        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password"   required>
                        <input type="checkbox" class="show_pass" onclick="togglePassword('newpassword')" /> Show Password
                        <br><br>

                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password "   required>
                        <input type="checkbox" class="show_pass" onclick="togglePassword('confirmpassword')" /> Show Password
                   <br><br>

                        <input type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () =>
            container.classList.add('right-panel-active'));

        signInButton.addEventListener('click', () =>
            container.classList.remove('right-panel-active'));
    </script>
    <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }
    </script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
</body>

</html>