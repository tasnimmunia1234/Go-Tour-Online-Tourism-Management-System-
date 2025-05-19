
<?php
include 'database.php';
    
if(isset($_POST['add_package'])){
    $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
   
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;
   $p_msg = mysqli_real_escape_string($conn, $_POST['p_msg']);
   $p_img = $_FILES['p_img']['name'];
   $p_img_tmp_name = $_FILES['p_img']['tmp_name'];
   $p_img_folder = 'uploaded_img/'.$p_img;
   $p_offer = mysqli_real_escape_string($conn, $_POST['p_offer']);
   $p_type= $_POST['p_type'];
   $discount= $_POST['discount'];
   

    $errors = array();
           
           if (empty($p_name) OR empty($p_price) OR empty($p_image) OR empty($p_msg) OR empty($p_offer) OR empty($p_type) OR empty($discount) OR empty($p_img)) {
            array_push($errors,"All fields are required");
           }
 else{
    $insert_query = mysqli_query($conn, "INSERT INTO `packages`(name, price, image,msg,img,offer_pac,category,discount ) VALUES('$p_name', '$p_price', '$p_image','$p_msg','$p_img','$p_offer','$p_type','$discount')") or die('query failed');
 
    if($insert_query){
       move_uploaded_file($p_image_tmp_name, $p_image_folder);
       $message[] = 'Package add succesfully';
    }else{
       $message[] = 'Could not add the package';
    }}
 };

 if(isset($_GET['delete'])){
    $delete_id= $_GET['delete'];
    $delete_query= mysqli_query($conn, "DELETE FROM `packages` WHERE pak_id = $delete_id");

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
    
   <link rel="stylesheet" href="asset/admindashbord.css">
    <link rel="stylesheet" href="asset/navbar.css">
    <link rel="stylesheet" href="asset/addpackage.css">
    
    <title>Admin Dashboard</title>
</head>
<body>
  
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

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
<div class="container">
    <section>
        <form action="" method="post" class="add-package-form" enctype="multipart/form-data"> 
            <h3>Add a Package</h3>

            <input type="text" name="p_name" placeholder="Enter the location name" class="box" require>

            <input type="number" name="p_price" min="0" placeholder="Enter the  price" class="box" require>
            <input type="number" name="discount" min="0" placeholder="Enter the discount" class="box" require>
           
            <input type="text" name="p_msg" min="0" placeholder="Enter the Package description" class="box" require>

            <input type="text" name="p_offer" min="0" placeholder="Enter the Package details" class="box" require>


            <input type="file" name="p_image"  placeholder="Enter the 1st image" accept="image/png,image/jpg,image/jpeg"
            class="box" require>

            <input type="file" name="p_img"  placeholder="Enter the 2nd image" accept="image/png,image/jpg,image/jpeg"
            class="box" require>

            <label for="catagory">Select Catagory</label>
            <select name="p_type" id="" class="box">
                <option value="#">-------Select Catagory-------</option>
                <option value="Couple package">Couple Package</option>
                <option value="bangladeshi package">Bangladeshi Package</option>
                
                <option value="International">International Package</option>
                
                <option value="populer package">Populer Package</option>

            </select>

            <input type="submit" name="add_package" value="Add the package" class="btn" require>
        </form>
   
</div>

</div>

</div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="asset/dashbord.js"></script>
</body>
</html>