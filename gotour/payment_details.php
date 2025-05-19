<?php
include 'database.php';
session_start();

if (isset($_GET['payId'])) {
    $payId = intval($_GET['payId']);
    
    // Fetch payment details for the given BookingId
    $sql = "SELECT * FROM pay WHERE BookingId=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $payId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $paymentDetails = $result->fetch_assoc();
        // Return payment details in JSON format
        echo json_encode($paymentDetails);
    } else {
        echo json_encode(["error" => "No payment details found."]);
    }
    exit(); // Terminate the script
}
?>
