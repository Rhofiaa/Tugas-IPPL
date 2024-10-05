<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Simulate job application
echo "<h1>Job Application Submitted</h1>";
?>

