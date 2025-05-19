<?php
include "admindb.php";
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `users` WHERE id = $delete_id");

    if($delete_query){
        header('Location: adashbord.php'); // Redirect after deletion
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="adashbord.css">
</head>
<body>
   <div class="container mt-3">
    <table id="myTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#S1</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Action</th>
            </tr>
        </thead> 
        <tbody>
            <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users`");
            if(mysqli_num_rows($select_users) > 0){
                $s1 = 1;
                while($fetch_users = mysqli_fetch_assoc($select_users)){
            ?>
                <tr>
                    <td><?php echo $s1; ?></td>
                    <td><?php echo $fetch_users['full_name']; ?></td>
                    <td><?php echo $fetch_users['email']; ?></td>
                    <td><?php echo $fetch_users['number']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $fetch_users['id'];?>"  class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="adashbord.php?delete=<?php echo $fetch_users['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
                $s1++;  
                }
            } else {
                echo '<tr><td colspan="5" class="text-center bg-info">Data not found</td></tr>';
            }
            ?>
        </tbody>
    </table>
   </div>
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
