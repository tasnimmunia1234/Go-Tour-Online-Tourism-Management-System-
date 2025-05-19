<?php
include "admindb.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="aprofile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="asset/navbar.css">
</head>
<body>
               
  <nav class="navbar sticky-top navbar-expand-lg">
    <div class="logo">Go Tour</div>
    
</nav>

<?php
            $id= $_GET['id'];
            $select_admins = mysqli_query($conn, "SELECT * FROM `admins`");
           $select_admins=$select_admins->fetch_assoc();
            ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <div class="text-center card-box">
                    <div class="member-card ">
                        <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="">
                            <h4><?php echo $select_admins['full_name'];?></h4>
                            
                            <p class="text-muted">Admin<span>| </span><span><a href="#" class="text-pink"><?php echo $select_admins['email'];?></a></span></p>
                            
                        </div>
                        <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <a href="adashbord.php" class="btn btn-sm btn-dark"><i class="fa-solid fa-house"></i> Go Back</a>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-2">
                                        <h4>7845</h4>
                                        <p class="mb-0 text-muted">Users</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-2">
                                        <h4>50+</h4>
                                        <p class="mb-0 text-muted">Packges</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-2">
                                        <h4>20+</h4>
                                        <p class="mb-0 text-muted">Servies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
       
    </div>
    
                          </body>
</html>