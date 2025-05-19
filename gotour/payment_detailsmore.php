<?php
session_start();
include 'database.php'; // Database configuration

if (isset($_GET['payId'])) {
    $payId = intval($_GET['payId']);

    // Prepare SQL statement to fetch payment details
    $sql = "SELECT 
                pay.*, 
                users.name AS username, 
                users.email AS email,
                booking.customer, 
                packages.name AS package_name, 
                packages.price AS package_price 
            FROM 
                pay 
            JOIN 
                booking ON pay.BookingId = booking.BookingId 
            JOIN 
                users ON booking.email = users.email 
            JOIN 
                packages ON booking.PackageId = packages.pak_id 
            WHERE 
                pay.BookingId = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $payId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $paymentDetails = $result->fetch_assoc();
    } else {
        // Handle case where payment details are not found
        echo "No payment details found.";
        exit;
    }
} else {
    // Redirect if payId is not set
    header("Location: managebook.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/payment_details.css">
    <title>Payment Details</title>
    <script>
        // Function to confirm before leaving the page
        //window.onbeforeunload = function() {
            //return "You have unsaved changes. Do you really want to leave?";
        //};

        // Function to calculate total price dynamically (if needed)
        function calculateTotalPrice() {
            const price = <?php echo htmlentities($paymentDetails['package_price']); ?>;
            const customerCount = <?php echo htmlentities($paymentDetails['customer']); ?>;
            const totalPrice = price * customerCount;

            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2); // Display total price
        }

        // Run the calculateTotalPrice function on page load
        window.onload = calculateTotalPrice;
    </script>
    
</head>
<body>
    <div class="container">
        <h2 class="Payment_Details_head">Credit Card Payment Details</h2>
        <p><strong>Customer Name:</strong> <?php echo htmlentities($paymentDetails['username']); ?></p>
        <p><strong>Customer Email:</strong> <?php echo htmlentities($paymentDetails['email']); ?></p>
        <p><strong>Package Name:</strong> <?php echo htmlentities($paymentDetails['package_name']); ?></p>
        <p><strong>No. Of Customer:</strong> <?php echo htmlentities($paymentDetails['customer']); ?></p>
        <p><strong>Total Price:</strong> <span id="totalPrice"></span></p>
        <p><strong>Name on Card:</strong> <?php echo htmlentities($paymentDetails['NameOnCard']); ?></p>
        <p><strong>Card Number:</strong> **** **** **** <?php echo htmlentities(substr($paymentDetails['CardNumber'], -4)); ?></p>
        <p><strong>Expiry Date:</strong> <?php echo htmlentities($paymentDetails['ExpMonth'] . '/' . $paymentDetails['ExpYear']); ?></p>
        <p><strong>CVV:</strong> *** (for security purposes, the CVV is not displayed)</p>
        <p><strong>Billing Address:</strong> <?php echo htmlentities($paymentDetails['address']) . ', ' . htmlentities($paymentDetails['City']) . ', ' . htmlentities($paymentDetails['State1']); ?></p>
        
        <!-- Back Button -->
        <button onclick="window.location.href='managebook.php';">Back</button>
        <!-- OR using an anchor tag
        <a href="managebook.php" class="back-button">Back</a>
        -->
    </div>
</body>
</html>
