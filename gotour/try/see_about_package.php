<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Package</title>
    <link rel="stylesheet" href="asset/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/try.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/package.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

 
<?php

if(isset($message)){

   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


 
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
    <div class="logo">Go Tour</div>
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="package.php">Package</a></li>
        <li><a href="review.php">Review</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a class="btn btn-danger" href="dashbord.php" role="button">Log Out</a></li>
    </ul>
    
</nav>

<div class="container-head">
    <section class="package">
<h1 class="heading">Package</h1>
    </section>
</div>
<main>


<?php

$select_packages = mysqli_query($conn, "SELECT * FROM `packages`");
if(mysqli_num_rows($select_packages) > 0){
    
   while($fetch_package = mysqli_fetch_assoc($select_packages)){
    if($fetch_package["category"]==1){
?>


    <form action="" method="post">
    <div class="card">
        <div class="image">
        <img src="uploaded_img/<?php echo $fetch_package['image']; ?>"  alt="">
        </div>
        <div class="caption">
            <p class="rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </p>
            <p class="package_name"><?php echo $fetch_package['name']; ?></p>
            <p class="price">$<?php echo $fetch_package['price']; ?>/</p>
            <h4 class="msg"><?php echo $fetch_package['msg']; ?></h4>
            <input type="hidden" name="p_name" value="<?php echo $fetch_package['name']; ?>">
            <input type="hidden" name="p_price" value="<?php echo $fetch_package['price']; ?>">
            <input type="hidden" name="p_image" value="<?php echo $fetch_package['image']; ?>">
            <input type="hidden" name="p_msg" value="<?php echo $fetch_package['msg']; ?>">
            <button class="add" name="add">See More</button>
        </div>
        
    </div>
</form>
  
<?php
   };
         };
      };
      ?>
</main>
   

</section>

</div>
    
</body>
</html>