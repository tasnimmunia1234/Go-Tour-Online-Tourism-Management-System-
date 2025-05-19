<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <link rel="stylesheet" href="asset/profile.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  

</head>

<body>


<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
    <div class="logo">Go Tour</div>
    <ul class="menu">
    <li><a class="btn btn-sm btn-info" id="back" href="main.php"><i class="fas fa-home"></i> Back To Home</a></li>
        
       
    
</nav>
<?php
            $id= $_GET['id'];
            $select_users = mysqli_query($conn, "SELECT * FROM `users`");
           $select_users=$select_users->fetch_assoc();
            ?>
            <div class="container">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-md-12">
    
                    <div class="card user-card-full">
                          <div class="row ">
                       <div class="col-sm-5 bg-c-lite-green user-profile">
                      <div class="card-block text-center text-white">
                          <div class="m-b-25">
                          
                                 <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-logo" alt="User-Profile-Image">
                                    </div>
                              <h5 class="f-w-600"><?php echo $select_users['full_name'];?></h5>
                               <p>Travler</p>
                 <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                               </div>
                    </div>
                          <div class="col-sm-7">
                            <div class="card-block">
                             <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information:</h6>
                            <div class="row">
                        <div class="col-sm-6">
                        <h4 class="m-b-10 f-w-600">Name</h4>
                            <h5 class="text-muted f-w-400"> <?php echo $select_users['full_name'];?></h5>
                           </div>
                           <div class="col-sm-6">
                   <p class="m-b-10 f-w-600">Email</p>
                                  <h6 class="text-muted f-w-400"><?php echo $select_users['email'];?></h6>
                                          </div>
                                    
                                  </div>
                 <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                           <div class="row">
                         <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Number</p>
                               <h6 class="text-muted f-w-400"><?php echo $select_users['number'];?></h6>
                                             </div>
                              <div class="col-sm-6">
                                 <p class="m-b-10 f-w-600">Travle</p>
                                   <h6 class="text-muted f-w-400">20+ Destination</h6>
                                         </div>
                             </div>
                             <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook"><i class="fa-brands fa-facebook fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Twitter"><i class="fa-brands fa-x-twitter fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Whatsapp"><i class="fa-brands fa-whatsapp fa-beat-fade fa-2xl" style="color: #181b1b;"></i></a></li>
                        </ul>               
                
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                             </div>
                                             
                                                </div>
                                                
                                            </div>
             
</div>


       <!--===========Footer=================-->
       <div class="footer">
      <div class="container_footer">
      <div class="row">
        <div class="col-md-4">
           <div class="logo_title">Go Tour</div>
      <img src="img/logo.png" class="footer_logo" alt="">

      <p class="footer_text">Traveling allows you to experience different parts of the world and immerse yourself in new cultures. You can try new foods, learn new customs, and see things you've never seen before.Here Go Tour is a leading tour operator of Bangladesh.Go Tour offer inbound and outbound tour for Traveler.</p>
    </div>




        <div class="col-md-4"> 
          <div class="box-container">
      <div class="box">
         <h3>Quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> Package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> Book</a>
         <a href="#"> <i class="fas fa-angle-right"></i> Terms of use</a>
      </div>
    </div>
</div>

        <div class="col-md-4">
          <div class="contact_box">
         <h3>Contact Info</h3>
         <p class="contacr_info"><i class="fas fa-phone"></i> +880-1517-089144</p>
         <p class="contacr_info"><i class="fas fa-phone"></i> +111-2222-333333</p>
         <p class="contacr_info"><i class="fas fa-envelope"></i> munia19800@gmail.com</p>
         <p class="contacr_info"><i class="fas fa-location"></i> Dhaka, Bangladesh - 1215</p>
        
         
      </div>
    </div>
      </div>
        </div>
        <div class="credit"><span>Copyright © 2024 Go Tour.</span> | all rights reserved! </div>
    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.js" integrity="sha512-docBEeq28CCaXCXN7cINkyQs0pRszdQsVBFWUd+pLNlEk3LDlSDDtN7i1H+nTB8tshJPQHS0yu0GW9YGFd/CRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>