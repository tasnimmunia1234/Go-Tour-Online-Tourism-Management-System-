<?php

session_start(); // Ensure the session is started
error_reporting(0);
include 'database.php';
// Check if user is logged in
if (strlen($_SESSION['email']) == 0) {
	header('location:main.php');
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
                window.location.href='viewbook.php';
              </script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
</head>
<body>
    <div id="page" class="page">
        <!-- Site header -->
        <?php include 'include/navbar.php'; ?>

        <main id="content" class="site-main">
            <!-- Inner Banner -->
            <section class="confirm-inner-page">
                <div class="inner-banner-wrap">
                    <div class="inner-banner-container" style="background-image: url(assets/images/img7.jpg);">
                        <div class="container">
                            <div class="inner-banner-content">
                                <h1 class="page-title">Your Bookings</h1>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                        <th>Mobile No.</th>
                                                        <th>Email</th>
                                                        <th>Package Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $uemail = $_SESSION['id'];
                                                    $sql = "SELECT `booking`.BookingId as bookid, 
                                 booking.FirstName as fname, 
                                       booking.Phone as mnumber, 
                                         users.email as email, 
                                        packages.name as name, 
                                   booking.PackageId as pid, 
                                     booking.status as status, 
                                  booking.CancelledBy as cancelby 
                                  FROM `users`
                                    JOIN booking ON booking.email = users.email 
                                     JOIN packages ON packages.pak_id = booking.PackageId 
                                       WHERE `users`.id = ?";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("i", $uemail);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) { ?>
                                                            <tr>
                                                                <td>#BK-<?php echo htmlentities($row['bookid']); ?></td>
                                                                <td><?php echo htmlentities($row['fname']); ?></td>
                                                                <td><?php echo htmlentities($row['mnumber']); ?></td>
                                                                <td><?php echo htmlentities($row['email']); ?></td>
                                                                <td><a href="package_details.php?pak_id=<?php echo htmlentities($row['pid']); ?>"><?php echo htmlentities($row['name']); ?></a></td>
                                                                <td><?php 
                                                                    if ($row['status'] == 0) {
                                                                        echo "Pending";
                                                                    } elseif ($row['status'] == 1) {
                                                                        echo "Confirmed";
                                                                    } elseif ($row['status'] == 2 && $row['cancelby'] == 'a') {
                                                                        echo "Cancelled by admin";
                                                                    } elseif ($row['status'] == 2 && $row['cancelby'] == 'u') {
                                                                        echo "Cancelled by user";
                                                                    }
                                                                ?></td>
                                                                <td>
                                                                    <?php if ($row['status'] != 2) { ?>
                                                                        <a href="viewbook.php?bkid=<?php echo htmlentities($row['bookid']); ?>">Cancel</a>
                                                                    <?php } else { ?>
                                                                        Cancelled
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    } ?>
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
</body>
</html>
