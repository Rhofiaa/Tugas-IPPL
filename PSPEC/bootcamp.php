<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Simulate bootcamp access
echo "<h1>Welcome to Bootcamp</h1>";
echo "<a href='apply_job.php'>Apply for a Job</a>";
?>