<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Simulate payment gateway response
$isPaymentSuccessful = true; // Normally, this will come from the payment gateway

if ($isPaymentSuccessful) {
    echo "Payment successful!";
    header("Location: bootcamp.php");
} else {
    echo "Payment failed!";
}
