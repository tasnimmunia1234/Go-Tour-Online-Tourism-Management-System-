<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: dashbord.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="asset/usernavbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
    <div class="logo">Go Tour</div>
    <ul class="menu">
    <li><a class="btn btn-sm btn-info" id="back" href="index.php"><i class="fas fa-home"></i> Back</a></li>
    
</nav>

    <div class="section1">
        <div class="container">
        
        <?php
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $fullName = $_POST["full_name"];
            $number = $_POST["number"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            // Validation
            if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($number)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($number) != 11) {
                array_push($errors, "Number must be exactly 11 characters long");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Passwords do not match");
            }

            require_once "database.php";

            // Check if the email already exists using prepared statement
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die("SQL error.");
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    array_push($errors, "Email already exists!");
                }
            }

            // If no errors, insert the user
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users (email, password, full_name, number) VALUES (?, ?, ?, ?)";
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $email, $passwordHash, $fullName, $number);
                    mysqli_stmt_execute($stmt);

                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                    //header("refresh:2;url=login.php");
                } else {
                    echo "<div class='alert alert-danger'>Something went wrong. Please try again later.</div>";
                }
            }
        }
        ?>

            <div class="container1">
                <form action="registration.php" method="post" class="mx-auto" id="form">
                    <h4>Registration Form</h4>
                    <div class="form-group">
                    <i class="fa-solid fa-user"></i><label class="pl-2" for="full_name">Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Full Name:">
                    </div>

                    <div class="form-group">
                    <i class="fa-solid fa-envelope"></i><label class="pl-2" for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email:">
                    </div>
            
                    <div class="form-group">
                    <i class="fa-solid fa-phone"></i><label class="pl-2" for="number">Number</label>
                        <input type="tel" class="form-control" name="number" placeholder="Number:" >
                    </div>
                    <div class="form-group">
                    <i class="fa-solid fa-lock"></i><label class="pl-2" for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password:">
                    </div>
                    <div class="form-group">
                    <i class="fa-solid fa-lock"></i><label class="pl-2" for="password">Confirm-Password</label>
                        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
                    </div>
                    <div class="form-btn">
                        <input type="submit" class="btn btn-primary" value="Register" name="submit">
                        <p>Already Registered? <a href="login.php">Login Here</a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
