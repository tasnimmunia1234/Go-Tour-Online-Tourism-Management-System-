<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slider</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="slider.css">
   
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
<script> 
$(document).ready(function(){
    $('.product-slider').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
});
</script>

</head>
<body>
    <div class="container">
        <h1 class="offer_package">POPULER PACKAGES</h1>
        <div class="product-slider">
            <?php
            
$select_packages = mysqli_query($conn, "SELECT * FROM `packages` WHERE category='populer package' ");
if(mysqli_num_rows($select_packages) > 0){
    
   while($fetch_package = mysqli_fetch_assoc($select_packages)){
    $img = 'uploaded_img/'.$fetch_package["image"];
   // if($fetch_package["category"]=='Couple package'){
?>

<div class="slide">
    <img src="<?php echo $img;?>" alt="">
    
    <h3 class="caption"><?php echo $fetch_package['name']?></h3>
    <h4 class="masg"><?php echo $fetch_package['msg']; ?></h4>
    <p class="discount"><del>TK<?php echo $fetch_package['discount']; ?></del></p>
    <p class="price"><b><?php echo $fetch_package['price']; ?>/-</b></p>

    <button class="add" name="add" ><a href="package_details.php?pak_id=<?php echo $fetch_package['pak_id']; ?>">See more</a></button>
    
</div>


         <?php
   };};
         
         
         ?> 
        </div>
    </div>

</body>
</html>