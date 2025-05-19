<?php
include 'database.php'; // Include your database connection file

// Email validation function to ensure it starts with a valid name
function is_valid_email($email) {
    // Regex pattern that starts with a letter and allows letters, numbers, dots, etc.
    $pattern = '/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($pattern, $email);
}

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Validate email pattern
    if (!is_valid_email($email)) {
        echo "<script>
                alert('Invalid email address format 😒. Please try again.');
                window.location.href='sign-in.php';
              </script>";
        exit();
    }

    // Check if the passwords match
    if ($password === $cpassword) {
        // Check if the email already exists
        $checkuser = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($checkuser);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result(); // Store result to check num_rows

        if ($stmt->num_rows == 0) {
            // Insert the new user into the database
            $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $stmt->bind_param('sss', $name, $email, $hashed_password);
            $stmt->execute();

            echo "<script>
                alert('Registration Successful 😊');
                window.location.href='sign-in.php';
                </script>";
        } else {
            echo "<script>
                alert('This email $email already exists. Please sign up with a different email 😁');
                window.location.href='sign-in.php';
                </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Passwords do not match 😒');
                window.location.href='sign-in.php';
                </script>";
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email pattern
    if (!is_valid_email($email)) {
        echo "<script>
                alert('Invalid email address format 😒. Please try again.');
                window.location.href='sign-in.php';
              </script>";
        exit();
    }

    // Check if the user exists and fetch their data
    $checkuser = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($checkuser);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            if ($row['status'] === 'active') {
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                header("location: home.php");
            } else {
                echo "<script>
                    alert('Your account is not active. Please contact support.');
                    window.location.href='sign-in.php';
                    </script>";
            }
        } else {
            echo "<script>
                alert('Incorrect password 😢');
                window.location.href='sign-in.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('User not found 😢');
            window.location.href='sign-in.php';
            </script>";
    }
    $stmt->close();
}

$conn->close(); // Close the database connection
?>
