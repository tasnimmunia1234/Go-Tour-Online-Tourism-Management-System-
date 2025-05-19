<?php
include 'database.php';

// Code for cancelling the booking
if (isset($_REQUEST['bkid'])) {
    $bid = intval($_GET['bkid']);
    $status = 2; // Status for cancelled
    $cancelby = 'a'; // 'a' means cancelled by admin
    $sql = "UPDATE booking SET status=?, CancelledBy=? WHERE BookingId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $status, $cancelby, $bid);
    $stmt->execute();
    $msg = "Booking Cancelled successfully";
}

// Code for confirming the booking
if (isset($_REQUEST['bckid'])) {
    $bcid = intval($_GET['bckid']);
    $status = 1; // Status for confirmed
    $conformtime = date('Y-m-d H:i:s'); // Get current timestamp in a MySQL-friendly format
    $sql = "UPDATE booking SET status=?, confirmtime=? WHERE BookingId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $status, $conformtime, $bcid);
    $stmt->execute();
    $msg = "Booking Confirmed successfully";
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
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
  
    <link rel="stylesheet" href="asset/managebooking.css">
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
                        <span>Messages</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="managebook.php" class="sidebar-link">
                    <i class="fa-solid fa-calendar-days"></i>
                        <span>Manage Booking</span>
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
                <section class="display-package-table">
                    <h2>Manage Bookings</h2>
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Serial no</th>
                                <th>Booking id</th>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Email Id</th>
                                <th>Package Name</th>
                                <th>Package Category</th>
                                <th>RegDate</th>
                                <th>Confirm Date</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $cnt = 1;
                             $sql = "SELECT 
                             booking.BookingId as bookid, 
                             users.name as username, 
                             booking.customer as customer, 
                             users.email as email, 
                             packages.name as p_name, 
                             packages.category as p_type, 
                             packages.price as p_price, 
                             pay.BookingTime as BookingTime,
                             booking.PackageId as pid, 
                             booking.status as status, 
                             booking.payment_method as payment_method, 
                             booking.regDate as regDate, 
                             booking.confirmtime AS confirmtime,
                             booking.CancelledBy as cancelby 
                         FROM 
                             users 
                         JOIN 
                             booking ON booking.email = users.email 
                             
                         JOIN 
                             packages ON packages.pak_id = booking.PackageId  
                             LEFT JOIN pay ON booking.BookingId = pay.BookingId  ORDER BY 
                           booking.BookingId  DESC";
                            $query = $conn->query($sql);
                           
                            if ($query->num_rows > 0) {
                                while ($result = $query->fetch_assoc()) {
                                    $total_price = $result['p_price'] * $result['customer'];
                            ?>
                                    <tr>
                                    <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                        <td>#BK-<?php echo htmlentities($result['bookid']); ?></td>
                                        <td><?php echo htmlentities($result['username']); ?></td>
                                        <td class="text-center"><?php echo htmlentities($result['customer']); ?></td>
                                        <td><?php echo htmlentities($result['email']); ?></td>
                                        <td><a href="addpackage.php?pid=<?php echo htmlentities($result['pid']); ?>"><?php echo htmlentities($result['p_name']); ?></a></td>
                                        <td><?php echo htmlentities($result['p_type']); ?></td>

                                        <td><?php 
                                         if ($result['status'] == 2 && $result['cancelby'] == 'a'){ echo "Cancelled (Admin)";}
                                         elseif ($result['status'] == 2 && $result['cancelby'] == 'u') {echo "Cancelled (Admin)";}
                                        else {
                                        echo htmlentities($result['confirmtime']);} ?></td>

                                        <td><?php echo htmlentities($result['regDate']); ?></td>
                                        <td class="text-center"><?php echo htmlentities($total_price); ?></td>
                                        <td>
    <?php 
    if ($result['BookingTime']) {
       // echo '<a href="#" onclick="showPaymentDetails(' . htmlentities($result['bookid']) . ')">Credit Card</a>';
       echo '<a href="payment_detailsmore.php?payId=' . htmlentities($result['bookid']) . '">Credit Card</a>';

    } else {
        echo htmlentities($result['payment_method']); // Show payment method when BookingTime is NULL
    }
    ?>
</td>

                                                 <td><?php 
                                         if ($result['BookingTime']) {
                                            echo "Done"; // Show "Credit Card" when BookingTime exists
                                                  }

                                         elseif ($result['status'] == 2 && $result['cancelby'] == 'u') {echo "Payment Due";}

                                         elseif ($result['status'] == 1) {echo "Done";}
                                        else {
                                        echo "Payment Due";} ?></td>

                                       
                                        <td><?php 
                                            if ($result['status'] == 0) echo "Pending"; 
                                            if ($result['status'] == 1) echo "Confirmed"; 
                                            if ($result['status'] == 2 && $result['cancelby'] == 'a') echo "Cancelled (Admin)";
                                            if ($result['status'] == 2 && $result['cancelby'] == 'u') echo "Cancelled (User)"; 
                                        ?></td>
                                        <td>
                                            <?php if ($result['status'] == 2) { ?>
                                            <p> <strong style="color: #ac0002;"> Cancelled</strong></p><?php } 
                                                 elseif ($result['status'] == 1) { ?>
                                            <p> <strong style="color: #1ea561;"> Confirmed </strong></p>
                                            <?php } else { ?>
                                                <a href="managebook.php?bkid=<?php echo htmlentities($result['bookid']); ?>" onclick="return confirm('Do you really want to cancel booking')"><i class="fa-solid fa-rectangle-xmark fa-lg" style="color: #ac0202;"></i> </a>
                                                
                                                <a href="managebook.php?bckid=<?php echo htmlentities($result['bookid']); ?>" onclick="return confirm('Booking has been confirmed')"><i class="fa-solid fa-circle-check fa-lg" style="color: #042e81;"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php
                                    $cnt++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="asset/dashbord.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
function showPaymentDetails(payId) {
    fetch('payment_details.php?payId=' + payId)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                const paymentInfo = `
                    Name on Card: ${data.NameOnCard}
                    Card Number: ${data.CardNumber}
                    Card Number: ${data.CardNumber.replace(/.(?=.{4})/g, '*')}
                    Expiry Month: ${data.ExpMonth}
                    Expiry Year: ${data.ExpYear}
                    CVV: *** (for security purposes, the CVV is not displayed)
                    City: ${data.City}
                    State: ${data.State1}
                    Address: ${data.address}
                `;
                alert(paymentInfo);
            }
        })
        .catch(error => {
            console.error('Error fetching payment details:', error);
            alert('An error occurred while fetching payment details.');
        });
}
</script>
    <script>
       let table = new DataTable('#myTable');

    </script>
</body>
</html>
