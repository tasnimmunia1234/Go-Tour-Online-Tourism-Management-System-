<?php
session_start();
error_reporting(0);
include('database.php');

if (isset($_POST['submit'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $username = $_SESSION['email'];

    // Query to fetch the hashed password from the database
    $sql = "SELECT password FROM users WHERE email='$username'";
    $query = mysqli_query($conn, $sql);

    // Check if the query returned a result
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $db_password = $row['password'];

        // Verify the current password against the hashed password
        if (password_verify($currentPassword, $db_password)) {
            // Hash the new password
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $con = "UPDATE users SET password='$hashed_password' WHERE email='$username'";
            $chngpwd1 = mysqli_query($conn, $con);

            if ($chngpwd1) {
                echo "<script>
                    alert('Password Changed Successfully 😊');
                    window.location.href='user_profile.php';
                    </script>";
            } else {
                echo "<script>
                    alert('Something went wrong. Please try again 😢');
                    window.location.href='user_profile.php';
                    </script>";
            }
        } else {
            echo "<script>
                alert('Current Password does not match 😢😢😢');
                window.location.href='user_profile.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('User not found 😢');
            window.location.href='user_profile.php';
            </script>";
    }
}
?>
