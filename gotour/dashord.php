<?php
include 'database.php';
session_start(); // Start session if not already started

// Initialize variables for total users and total bookings
$total_users_with_booking = 0;
$total_bookings = 0;

?>

<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

     <link rel="stylesheet" href="admin_dashbord.css">
    <link rel="stylesheet" href="asset/admindashbord.css">
    <link rel="stylesheet" href="asset/navbar.css">
    <title>Admin Dashboard</title>
   
</head>
<body>
<div class="wrapper">
    <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Admin</a>
                </div>
            </div>
            <ul class="sidebar-nav">
            <li class="sidebar-item">
                    <a href="admin_dashbord.php" class="sidebar-link">
                    <i class="fa-solid fa-house"></i>
                        <span>Dashbord</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="users_list.php" class="sidebar-link">
                    <i class="fa-solid fa-users"></i>
                        <span>User Info</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="aprofile.php" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
        data-bs-target="#managePackage" aria-expanded="false" aria-controls="managePackage">
        <i class="lni lni-protection"></i>
        <span>Manage Package</span>
    </a>
    <ul id="managePackage" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="list-style-solid-type:circle;">
        <li class="sidebar-item">
            <a href="addpackage.php" class="sidebar-link">Add Package</a>
        </li>
        <li class="sidebar-item">
            <a href="managepackage.php" class="sidebar-link">Manage Packages</a>
        </li>
    </ul>
</li>

<li class="sidebar-item">
    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
        data-bs-target="#manageGallery" aria-expanded="false" aria-controls="manageGallery">
        <i class="fa-solid fa-images"></i>
        <span>Manage Gallery</span>
    </a>
    <ul id="manageGallery" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="list-style-solid-type:circle;">
        <li class="sidebar-item">
            <a href="addgallery.php" class="sidebar-link">Add Photo</a>
        </li>
        <li class="sidebar-item">
            <a href="managegallery.php" class="sidebar-link">Manage Gallery</a>
        </li>
    </ul>
</li>

                <li class="sidebar-item">
                    <a href="adminreview.php" class="sidebar-link">
                    <i class="fa-solid fa-clipboard"></i>
                        <span>Review</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="admincontact.php" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Massage</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="managebook.php" class="sidebar-link">
                    <i class="fa-solid fa-calendar-days"></i>
                        <span>Manage Booking</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    
                    <a href="adminreg.php" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span>New Admin Assign</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="adminlogout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
             
  <nav class="navbar sticky-top navbar-expand-lg">
    <div class="logo">Go Tour</div>
    
</nav>

<div class="box-container">

<?php 
    // SQL query to count total users with at least one booking
    $sql_users = "SELECT COUNT(DISTINCT users.id) as total_users 
                  FROM users 
                  JOIN booking ON booking.email = users.email";
    $result_users = $conn->query($sql_users);
    if ($result_users && $row_users = $result_users->fetch_assoc()) {
        $total_users_with_booking = $row_users['total_users'];
    }

    $sql_users = "SELECT COUNT(users.id) as total_users FROM users";
    $result_users = $conn->query($sql_users);
    if ($result_users && $row_users = $result_users->fetch_assoc()) {
        $total_users = $row_users['total_users'];
    }
    // SQL query to count total bookings
    $sql_bookings = "SELECT COUNT(booking.BookingId) as total_bookings FROM booking";
    $result_bookings = $conn->query($sql_bookings);
    if ($result_bookings && $row_bookings = $result_bookings->fetch_assoc()) {
        $total_bookings = $row_bookings['total_bookings'];
    }

    $sql_admins = "SELECT COUNT(admins.admin_id) as total_admins FROM admins";
    $result_admins = $conn->query($sql_admins);
    if ($result_admins && $row_admins = $result_admins->fetch_assoc()) {
        $total_admins = $row_admins['total_admins'];
    }

    $sql_packages = "SELECT COUNT(packages.pak_id) as total_packages FROM packages";
    $result_packages = $conn->query($sql_packages);
    if ($result_packages && $row_packages = $result_packages->fetch_assoc()) {
        $total_packages = $row_packages['total_packages'];
    }

    // SQL query to calculate total amount from bookings
$sql_total_amount = "SELECT SUM(packages.price * booking.customer) AS total_amount 
FROM booking 
JOIN packages ON booking.PackageId = packages.pak_id";

$result_total_amount = $conn->query($sql_total_amount);
if ($result_total_amount && $row_total_amount = $result_total_amount->fetch_assoc()) {
$total_amount = $row_total_amount['total_amount'];
} 
// Get the current date
$current_date = date('Y-m-d');

// SQL query to calculate total amount from bookings for the current day
$sql_total_amount_today = "SELECT SUM(packages.price * booking.customer) AS total_amount 
                           FROM booking 
                           JOIN packages ON booking.PackageId = packages.pak_id 
                           WHERE DATE(booking.regDate) = ?";

$stmt = $conn->prepare($sql_total_amount_today);
$stmt->bind_param("s", $current_date);
$stmt->execute();
$result_total_amount_today = $stmt->get_result();

if ($result_total_amount_today && $row_total_amount_today = $result_total_amount_today->fetch_assoc()) {
    $total_amount_today = $row_total_amount_today['total_amount'];
} 

// SQL query to count total pending bookings
$sql_pending_bookings = "SELECT COUNT(BookingId) AS total_pending FROM booking WHERE status = '0'";

$result_pending_bookings = $conn->query($sql_pending_bookings);
if ($result_pending_bookings && $row_pending_bookings = $result_pending_bookings->fetch_assoc()) {
    $total_pending = $row_pending_bookings['total_pending'];
} 


?>

    <div class="box">
<div class="box_container"><p class="count_box"><?php echo $total_admins; ?></p> <span>Total Admins</span>  </div>
    
    <div class="box_container"><p class="count_box"> <?php echo $total_users; ?></p><span>Total Users</span></div>
    <div class="box_container">  <p class="count_box"><?php echo $total_users_with_booking; ?></p><span>Total Users with Booking</span></div>
    <div class="box_container"> <p class="count_box"><?php echo $total_amount; ?></p><span>Total Amount </span></div>

<div class="box_container"> <p class="count_box"><?php echo $total_amount_today; ?></p><span>Total Amount Today </span></div>


<div class="box_container"> <p class="count_box"> <?php echo $total_bookings; ?></p><span> Total Booking</span></div>

<div class="box_container">  <p class="count_box"><?php echo $total_pending; ?></p><span>Pending Bookings</span></div>


    <div class="box_container">  <p class="count_box"><?php echo $total_packages; ?></p><span>Total Packages</span></div>

  
    

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="asset/dashbord.js"></script>

</body>
</html>
