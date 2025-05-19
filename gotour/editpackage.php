<?php
include 'database.php';
?>

<?php
if (isset($_POST['update_package'])) {
    $update_p_id = mysqli_real_escape_string($conn, $_POST['update_p_id']);
    $update_p_name = mysqli_real_escape_string($conn,$_POST['update_p_name']);
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/' . $update_p_image;
    $p_msg = mysqli_real_escape_string($conn, $_POST['update_p_msg']);
    $p_img = $_FILES['update_p_img']['name'];
    $p_img_tmp_name = $_FILES['update_p_img']['tmp_name'];
    $p_img_folder = 'uploaded_img/' . $p_img;
    $p_offer = mysqli_real_escape_string($conn, $_POST['update_p_offer']);
    $p_type = $_POST['update_p_type'];
    $discount = $_POST['discount'];
    

    $update_query = mysqli_query($conn, "UPDATE `packages` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image', img = '$p_img', msg = '$p_msg', offer_pac = '$p_offer', category = '$p_type', discount = '$discount' WHERE pak_id = '$update_p_id'");

    if ($update_query) {
        if (!empty($update_p_image)) {
            move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        }
        if (!empty($p_img)) {
            move_uploaded_file($p_img_tmp_name, $p_img_folder);
        }
        $message[] = 'Package updated successfully';
        header('Location: managepackage.php');
    } else {
        $message[] = 'Package could not be updated';
        header('Location: managepackage.php');
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
    <link rel="stylesheet" href="asset/edit.css">

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
                $edit_query = mysqli_query($conn, "SELECT * FROM `packages` WHERE pak_id = $edit_id");
                if (mysqli_num_rows($edit_query) > 0) {
                    while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="150" alt="">
                            <img src="uploaded_img/<?php echo $fetch_edit['img']; ?>" height="150" alt="">

                            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['pak_id']; ?>">

                          <input type="text" name="update_p_name" placeholder="Enter the product name" class="box" value="<?php echo $fetch_edit['name']; ?>" require>


                            <input type="number" class="box" min="0" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                          
                            <input type="number" class="box" min="0" required name="discount" value="<?php echo $fetch_edit['discount']; ?>">

                            <input type="text" class="box" required name="update_p_msg" value="<?php echo $fetch_edit['msg']; ?>">

                            <input type="text" class="box" required name="update_p_offer" value="<?php echo $fetch_edit['offer_pac']; ?>">

                            <select name="update_p_type" id="" class="box">
                <option value="#">-------Select Catagory-------</option>
                <option value="Couple package">Couple Package</option>
                <option value="bangladeshi package">Bangladeshi Package</option>
                
                <option value="International">International Package</option>
                
                <option value="populer package">Populer Package</option>

            </select>

                            <input type="file" name="update_p_image" class="img" accept="image/png,image/jpg,image/jpeg">

                            <input type="file" name="update_p_img" class="img" accept="image/png,image/jpg,image/jpeg">

                            <input type="submit" name="update_package" value="Update the package" class="edit-btn">

                            <input type="reset" value="cancel" name="update_package" class="option-btn" id="close-edit">
                        </form>

                        <?php
                    }
                }
            }
            ?>
        </section>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src="asset/edit.js"></script>
</body>
</html>
