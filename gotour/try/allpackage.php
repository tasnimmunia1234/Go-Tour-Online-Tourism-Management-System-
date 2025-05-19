<?php
include 'database.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Agency :: Best Agency</title>

   <!-- Stylesheets -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


    <link rel="stylesheet" href="allpackage.css">
</head>
<body>



      <section>

<div>
    <h1 class="populer-pak">Checkout Our Packeges</h1>
    <p class="populer-text">Dicover New Places With Us, Adventure Awaits.</p>

    <?php
    
    $select_packages = mysqli_query($conn, "SELECT * FROM `packages`");
    if(mysqli_num_rows($select_packages) > 0){
        
       while($fetch_package = mysqli_fetch_assoc($select_packages)){
        //if($fetch_package["category"]=='Couple package'){
    ?>

    <div class="row">
        <div class="col"><div class="img">
            <img src="uploaded_img/<?php echo $fetch_package['image']; ?>" class="image"  alt="">
            </div></div>
        <div class="col"> 
            
        <div class="card-content">

                  <h3 class="h3 card-title"> <p class="package_name"><?php echo $fetch_package['name']; ?></p>
       </h3>

                  <p class="card-text">
                  Plan your trip with us and travel around the world with the most affordable packages!
                  </p>

                  

                
       
        <p class="msg"><?php echo $fetch_package['msg']; ?></p>
        </div>

    </div>

        <div class="col"><div class="card-price">

            <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
            
                <p class="price"><?php echo $fetch_package['price']; ?>/-</p>
                <div><a href="package_details.php?pak_id=<?php echo $fetch_package['pak_id']; ?>" name="add" class="see-details">See Details</a></button></div> 
             </div>

            </div>

    </div>
    <?php }}?>
</div>


      </section>

</body>
</html>