
<?php
include 'database.php';

 if(isset($_GET['delete'])){
    $delete_id= $_GET['delete'];
    $delete_query= mysqli_query($conn, "DELETE FROM `massage` WHERE msg_id = $delete_id");

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

        <link rel="stylesheet" href="asset/managecontact.css">
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
    <table id="myTable">
         <thead>
<th>Id</th>
<th>User Name</th>

<th>Email</th>
<th>Massage</th>
<th>action</th>
</thead>
<tbody>
         <?php
         
            $select_massages = mysqli_query($conn, "SELECT * FROM `massage`");
            if(mysqli_num_rows($select_massages) > 0){
                $s1=1;
               while($row = mysqli_fetch_assoc($select_massages)){
         ?>

         <tr>
            <td><?php echo $s1; ?></td>
            <td><?php echo $row['name']; ?></td>
           
            <td><?php echo $row['email']; ?></td>
           
            <td><?php echo $row['masg']; ?></td>
            
            <td>
               <a href="admincontact.php?delete=<?php echo $row['msg_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('are your sure you want to delete this?');"> <i  class="fas fa-trash"></i></a><br>
               </td>

         </tr>

         <?php
         $s1++;
            };    
            } 
            else{
               echo "<div class='empty'>No photo added</div>";
            };
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
       let table = new DataTable('#myTable');

    </script>
</body>
</html>