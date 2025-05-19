<?php
session_start();
error_reporting(0);
include('database.php'); // Database configuration

if (isset($_POST['submit'])) {
    $bid = intval($_GET['bkid']); // Get package ID
    
    // Payment details
    $bnameoncard = $_POST['nameoncard'];
    $bcard_number = $_POST['card_number'];
    $bexpire_month = $_POST['expire_month'];
    $bexpire_year = $_POST['expire_year'];
    $bcvv = $_POST['cvv']; // Corrected the variable from ccv to cvv

    // Billing details
    $baddress = $_POST['address'];
    $bcity = $_POST['city'];
    $bstate = $_POST['state'];

    // SQL Query to insert data into the booking table
    $sql = "INSERT INTO `pay`(BookingId, NameOnCard, CardNumber, ExpMonth, ExpYear, CVV, City, State1,address) 
            VALUES('$bid', '$bnameoncard', '$bcard_number', '$bexpire_month', '$bexpire_year', '$bcvv', '$bcity', '$bstate','$baddress')";

    if ($conn->query($sql) === TRUE) {
        $lastInsertId = $conn->insert_id;
        
        if ($lastInsertId) {
            echo "<script>
                    alert('Booking Successful 😊');
                   
                    </script>";
                    header("location: booking-history.php");
        } else {
            $error = "Something went wrong. Please try again";
        }
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="asset/payment.css">
</head>
<body>
<div>
<div class="cotainer_box">
    
<div class="box">
<?php 
                                    $uemail = $_SESSION['id'];
                                    $sql = "SELECT `booking`.BookingId as bookid, 
                                                   booking.name as fname, 
                                                   booking.customer as customer, 
                                                   users.email as email, 
                                                   packages.name as name,
                                                   packages.category as p_type,
                                                   packages.price as p_price,  
                                                   booking.PackageId as pid, 
                                                   booking.status as status, 
                                                   booking.CancelledBy as cancelby 
                                            FROM `users`
                                            JOIN booking ON booking.email = users.email 
                                            JOIN packages ON packages.pak_id = booking.PackageId 
                                            WHERE `users`.id = ?
                                            ORDER BY `booking`.BookingId DESC LIMIT 1"; // Fetch only the latest booking
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $uemail);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { 

                                            $total_price = $row['p_price'] * $row['customer'];
                                            ?>

                    <p class="summary">Summary</p>

                        <div>                 
                        <span>Destinatio:</span>
                        <input type="text" value="<?php echo htmlentities($row['name']); ?>" readonly>
                        </div>

                       <div>
                        <span>Customer:</span>
                        <input type="text" value="<?php echo htmlentities($row['customer']); ?>" readonly>
                        </div>
                       <div>
                        <span>Total price:</span>
                        <input type="text" value="<?php echo htmlentities($total_price); ?>" readonly>
                        </div>
                        </div>
<?php 
}

}?>

</div>
</div>


<div class="container">

    <form action="" method="post">

        <div class="row">

            <div class="col" id="address-box">

                <h3 class="title">Billing Address</h3>
                <div>
                <?php
                    $id = $_SESSION['id']; // Ensure that 'id' is stored in the session
                    $sql = "SELECT * FROM users WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="inputBox">
                        <span>Full Name :</span>
                        <input type="text" name="fname" value="<?php echo htmlentities($row['name']); ?>" readonly>
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" name="email" value="<?php echo htmlentities($row['email']); ?>" readonly>
                    </div>
                <?php } } ?>
                </div>

          <!--  <div>
           <div class="inputBox">
           <?php
                    $id = $_SESSION['BookingId']; // Ensure that 'id' is stored in the session
                    $sql = "SELECT * FROM `booking` WHERE BookingId=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                        <span>Address :</span>
                        <input type="text" name="address" value="<?php echo htmlentities($row['address']); ?>" readonly>
                    </div>
                    <?php }}?>
           </div>
                        -->

                        <div class="inputBox">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="Address" required>
                    </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="City" required>
                    </div>
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text"  name="state" placeholder="State" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Payment</h3>

                <div class="inputBox">
                    <span>Cards accepted :</span>
                    <img src="img/card_img.png" alt="Card Image">
                </div>
                <div class="inputBox">
                <label>Name On Card :</label>
                    <input type="text" name="nameoncard" id="nameoncard" required>
                </div>
                <div class="inputBox">
                <label>Card Number :</label>
                    <input type="text" name="card_number" id="card_number" class="form-control" minlength="16" maxlength="16" required>
                </div>


                <div class="flex">
                <div class="inputBox">
        <label>Exp Month :</label>
        <input type="text" name="expire_month" class="form-control" placeholder="MM" minlength="1" maxlength="2" required>
                        </div>
                        <div class="inputBox">
                        <label>Exp Year :</label>
        <input type="number" name="expire_year" class="form-control" placeholder="YYYY" min="2025" max="3000" required></div>
    </div>
          <div class="flex"> 
             <div class="inputBox">
             <label>CVV :</label>
                        <input type="text" name="cvv" id="cvv" class="form-control" placeholder="CVV" minlength="3" maxlength="3" required>
                    </div></div>
            </div>
    
        </div>


<div class="row" id="btn"><div class="col" id="cancle-btn"> <a href="booking.php" type="submit" class="cancle-btn" >  Cancle  </a>
                    </div>
<div class="col"> <input type="submit" name="submit" value="Payment" class="submit-btn">
                    </div></div>

    </form>

    <!-- Show success/error message -->
    <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert">
            <p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
        </div>
    <?php } ?>

</div>    
    
</body>
</html>
