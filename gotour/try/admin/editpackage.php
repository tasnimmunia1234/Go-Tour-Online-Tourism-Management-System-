
<?php
include 'admindb.php';
?>

<?php

if(isset($_POST['update_package'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/'.$update_p_image;
 
    $update_query = mysqli_query($conn, "UPDATE `packages` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");
 
    if($update_query){
       move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
       $message[] = 'Package updated succesfully';
       header('location:addpackage.php');
    }else{
       $message[] = 'package could not be updated';
       header('location: addpackage.php');
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
                    <a href="ahome.php" class="sidebar-link">
                        <i class="fa-solid fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
             
                <li class="sidebar-item">
                    
                    <a href="addpackage.php" class="sidebar-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Back</span>
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
if(isset($_GET['edit']));
$edit_id=$_GET['edit'];
$edit_query = mysqli_query($conn, "SELECT *FROM `packages` WHERE id=$edit_id");
if(mysqli_num_rows($edit_query)>0){
    while($fetch_edit =mysqli_fetch_assoc($edit_query)){
        ?>

<form action="" method="post" enctype="multipart/form-data">
    <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="150" alt="">
    <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id'];?>">
    <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name'];?>">
    <input type="number" class="box" min="0" required  name="update_p_price" value="<?php echo $fetch_edit['price'];?>">
    <input type="file" required name="update_p_image" value="<?php echo $fetch_edit['image'];?>"accept="image/png,image/jpg,image/jpeg">
    <input type="submit" name="update_package" value="Update the package" class="edit-btn">
    <input type="reset" value="cancel" name="update_package"  class="option-btn" id="close-edit">
</form>

        <?php
    };
   
};
?>

</section>
 
</div>

</div>

</div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="asset/edit.js"></script>
</body>
</html>