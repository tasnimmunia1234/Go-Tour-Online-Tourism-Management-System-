<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Package</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="asset/package_details.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  
    <style>
        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/cover.png");
        }
    </style>
</head>
<body>

<?php
// Display messages if any
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<div class="message"><span>' . $msg . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
    }
}
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
    <div class="logo">Go Tour</div>
    <ul class="menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="package.php">Packages</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="booking-history.php">My Booking</a></li>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More Options</button>
            <div class="dropdown-menu contain-box" aria-labelledby="dropdownMenu2">
                <li><a class="btn btn-info" href="gallery.php">Gallery</a></li>
                <li><a class="btn btn-info" href="review.php">Review</a></li>
            </div>
        </div>
    </ul>
</nav>

<div class="hero-image">
    <div class="hero-text">
        <h1 style="font-size:50px" class="heading">
            <span class="span">P</span><span class="span">A</span><span class="span">C</span><span class="span">K</span><span class="span">A</span>
            <span class="span">G</span><span class="span">E</span><span>-</span><span class="span">D</span><span class="span">E</span><span class="span">T</span>
            <span class="span">A</span><span class="span">I</span><span class="span">L</span><span class="span">S</span>
        </h1>
        <p class="ptext">All Amazing Packages</p>
    </div>
</div>

<section>
    <div class="detiles_container">
        <?php
        // Fetch package details directly (unsafe, for educational purposes only)
        $id = $_GET['pak_id'];  // No sanitization

        $query = "SELECT * FROM `packages` WHERE `pak_id` = '$id'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $package = mysqli_fetch_assoc($result);
        ?>

        <h1 class="location-name"><i class="fa-solid fa-location-dot fa-xs"></i> <?php echo $package['name']; ?></h1>

        <div class="row">
            <div class="col-md-4">
                <img src="uploaded_img/<?php echo $package['image']; ?>" class="image" alt="<?php echo $package['name']; ?>" width="250">
            </div>
            <div class="col-md-4">
                <img src="uploaded_img/<?php echo $package['img']; ?>" class="image" alt="<?php echo $package['name']; ?>" width="250">
            </div>
        </div>

        <div class="price_box">
            <p class="category"><strong><?php echo $package['category']; ?> :</strong></p>
            <h5 class="cap"><strong><?php echo $package['msg']; ?></strong></h5>
            <p class="pac_price"><strong><b>Price: </b><?php echo $package['price']; ?>/-</strong></p>
        </div>

        <div class="detiles">
            <p><strong>Notice:</strong> This is an all-inclusive package for 1 person. (If you want to add more people or extend your stay, extra charges will apply.)</p>
            <p><strong>Description:</strong> <?php echo $package['offer_pac']; ?></p>
        </div>

        <article class="package-include">
            <h3>INCLUDE & EXCLUDE :</h3>
            <div class="row">
                <div class="col-md-6">
                    <ul class="fa_check">
                        <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Specialized bilingual guide</p>
                        <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Hotel</p>
                        <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Breakfast and Lunch Box</p>
                        <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Entrance Fees</p>
                        <p><i class="fa-solid fa-check" style="color: #2fca42;"></i> Private Transport</p>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="fa_time">
                        <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Room Service Fees</p>
                        <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Guide Service Fee</p>
                        <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Any Private Expenses</p>
                        <p><i class="fa-solid fa-xmark" style="color: #f52e2e;"></i> Fees and Taxes</p>
                    </ul>
                </div>
            </div>
        </article>

        <?php
        } else {
            echo '<p>No package found.</p>';
        }
        ?>
    </div>
</section>

</body>
</html>
