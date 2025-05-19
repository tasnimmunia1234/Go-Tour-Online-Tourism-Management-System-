<?php
include 'database.php';

if(isset($_POST['update_gallery'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];

    // Check if new image is uploaded
    if (!empty($_FILES['update_p_image']['name'])) {
        $update_p_image = $_FILES['update_p_image']['name'];
        $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
        $update_p_image_folder = 'uploaded_img/'.$update_p_image;

        // Move uploaded file to folder
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);

        // Update with new image
        $update_query = mysqli_query($conn, "UPDATE `gallery` SET name = '$update_p_name', image = '$update_p_image' WHERE gallery_id = '$update_p_id'") or die('Query failed');
    } else {
        // Update without changing the image
        $update_query = mysqli_query($conn, "UPDATE `gallery` SET name = '$update_p_name' WHERE gallery_id = '$update_p_id'") or die('Query failed');
    }

    if($update_query){
       $message[] = 'Gallery updated successfully';
       header('location: managegallery.php');
       exit();
    }else{
       $message[] = 'Gallery could not be updated';
       header('location: managegallery.php');
       exit();
    }
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
    <link rel="stylesheet" href="asset/editgallery.css">
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


            <section class="edit-form-container">
                <?php
                if (isset($_GET['edit'])) {
                    $edit_id = $_GET['edit'];
                    $edit_query = mysqli_query($conn, "SELECT * FROM `gallery` WHERE gallery_id=$edit_id");
                    if (mysqli_num_rows($edit_query) > 0) {
                        while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="150" alt="Current Image">

                                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['gallery_id']; ?>">

                                <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">

                                <input type="file" name="update_p_image" class="img" accept="image/png, image/jpg, image/jpeg">

                                <input type="submit" name="update_gallery" value="Update the gallery" class="edit-btn">

                                <input type="reset" value="Cancel" class="option-btn" id="close-edit">
                            </form>
                            <?php
                        }
                    } else {
                        echo "<div class='empty'>No record found!</div>";
                    }
                }
                ?>
            </section>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="asset/edit.js"></script>
</body>
</html>
