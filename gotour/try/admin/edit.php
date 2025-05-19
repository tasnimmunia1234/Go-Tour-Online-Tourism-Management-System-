
<?php
include 'dbms.php';


if(isset($_POST['submit'])){
    $edit_id = $_POST['id'];
    $edit_name = $_POST['full_name'];
    $edit_email = $_POST['email'];
    $edit_number = $_POST['number'];
    
 
    $update_query = mysqli_query($conn, "UPDATE `users` SET full_name='$edit_name',email='$edit_email',number='$edit_number' WHERE id = '$edit_id'");
 
    if($update_query){
       
       $message[] = 'Package updated succesfully';
       header('location:ahome.php');
    }
 
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Info</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" href="asset/dashbord.css">
    <link rel="stylesheet" href="asset/navber.css">
    <link rel="stylesheet" href="asset/editu.css">
   
    <title>Admin Dashboard</title>
</head>
<body>
<?php
//if(isset($_GET['edit']));
    $edit_id = $_GET['id'];
    $edit_query = mysqli_query($conn, "SELECT *FROM `users` WHERE id=$edit_id");
    if(mysqli_num_rows($edit_query)>0){
        while($fetch_edit =mysqli_fetch_assoc($edit_query)){

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
                    <a href="ahome.php" class="sidebar-link">
                        <i class="fa-solid fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
             
                <li class="sidebar-item">
                    
                    <a href="ahome.php" class="sidebar-link">
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
<div class="container">

                <form action="" method="post" class="mx-auto" id="form">
                    <h4>Edit Form</h4>
                    <div class="form-group ">
                        <input type="text" class="form-control" value="<?php echo $fetch_edit['full_name'];?>" name="full_name" placeholder="Full Name:">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="<?php echo $fetch_edit['email'];?>" placeholder="Email:">
                    </div>
            
                    <div class="form-group">
                        <input type="tel" class="form-control" value="<?php echo $fetch_edit['number'];?>" name="number"  placeholder="Number:" >
                    </div>

                    <div class="form-btn md-4">
                        <input type="submit" class="btn btn-primary" value="Register" name="submit">
                        </div></form>

        <?php
    };
   
};
?>
             
    </div>
</section>




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="asset/dashbord.js"></script>
</body>
</html>