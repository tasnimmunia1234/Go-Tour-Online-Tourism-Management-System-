<?php
include "database.php";


   
if(isset($_POST['add_photo'])){
    $p_name = $_POST['p_name'];
  
    $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;
   
   

    $errors = array();
           
           if (empty($p_name) OR empty($p_image)) {
            array_push($errors,"All fields are required");
           }
 else{
    $insert_query = mysqli_query($conn, "INSERT INTO `gallery`(name, image) VALUES('$p_name',  '$p_image')") or die('query failed');
 
    if($insert_query){
       move_uploaded_file($p_image_tmp_name, $p_image_folder);
       $message[] = 'Package add succesfully';
    }else{
       $message[] = 'Could not add the package';
    }}
 };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addgallery.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="asset/admindashbord.css">
    <link rel="stylesheet" href="asset/navbar.css">
    <link rel="stylesheet" href="asset/addgallery.css">
</head>
<body>
  
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?><div class="wrapper">
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
            <h3>Add Photo</h3>

            <input type="text" name="p_name" placeholder="enter the photo name" class="box" require>


            <input type="file" name="p_image"  placeholder="Enter the 1st image" accept="image/png,image/jpg,image/jpeg"
            class="box" require>

            <input type="submit" name="add_photo" value="Add the photo" class="btn btn-info" require>

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