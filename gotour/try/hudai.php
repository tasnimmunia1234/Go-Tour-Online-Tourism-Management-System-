
<?php
include 'database.php';

if (isset($_REQUEST['bkid'])) {
    $bid = intval($_GET['bkid']);
    $status = 2;
    $cancelby = 'a';
    $sql = "UPDATE booking SET status=?, CancelledBy=? WHERE BookingId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isi", $status, $cancelby, $bid);
    $stmt->execute();
    $msg = "Booking Cancelled successfully";
}

// Code for confirm
if (isset($_REQUEST['bckid'])) {
    $bcid = intval($_GET['bckid']);
    $status = 1;
    $sql = "UPDATE booking SET status=? WHERE BookingId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $bcid);
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
    
        <link rel="stylesheet" href="asset/dashbord.css">
    <link rel="stylesheet" href="asset/navbar.css">
    <link rel="stylesheet" href="asset/managegallery.css">
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
                    <a href="aprofile.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Manage Package</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
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
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa-solid fa-images"></i>
                        <span>Manage Gallery</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
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
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
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
<section class="display-package-table">
<h2>Manage Bookings</h2>
						<table id="table">
							<thead>
								<tr>
									<th>Booking id</th>
									<th>Name</th>
									<th>Mobile No.</th>
									<th>Email Id</th>
									<th>Package Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead><tbody>
								<?php
								$sql = "SELECT booking.BookingId as bookid,users.name as name,booking.Phone as mnumber,users.email as email,packages.name as name,booking.PackageId as pid,booking.status as status,booking.CancelledBy as cancelby FROM users JOIN booking ON booking.email=users.email JOIN packages ON packages.pak_id=booking.PackageId";
								$query = $conn->query($sql);
								$cnt = 1;
								if ($query->num_rows > 0) {
									while ($result = $query->fetch_assoc()) {
								?>
										<tr>
											<td>#BK-<?php echo htmlentities($result['bookid']); ?></td>
											<td><?php echo htmlentities($result['name']); ?></td>
											<td><?php echo htmlentities($result['mnumber']); ?></td>
											<td><?php echo htmlentities($result['email']); ?></td>
											<td><a href="addpackage.php?pid=<?php echo htmlentities($result['pid']); ?>"><?php echo htmlentities($result['name']); ?></a></td>
											<td><?php 
												if ($result['status'] == 0) echo "Pending"; 
												if ($result['status'] == 1) echo "Confirmed"; 
												if ($result['status'] == 2 && $result['cancelby'] == 'a') echo "Cancelled (Admin)";
												if ($result['status'] == 2 && $result['cancelby'] == 'u') echo "Cancelled (User)"; 
											?></td>
											<td>
												<?php if ($result['status'] == 2) { ?>
													Cancelled
												<?php } else { ?>
													<a href="managebook.php?bkid=<?php echo htmlentities($result['bookid']); ?>" onclick="return confirm('Do you really want to cancel booking')">Cancel</a> / 
													<a href="managebook.php?bckid=<?php echo htmlentities($result['bookid']); ?>" onclick="return confirm('Booking has been confirmed')">Confirm</a>
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
</body>
</html>