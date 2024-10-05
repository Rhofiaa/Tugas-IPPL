<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Assuming the class ID is passed via POST or GET
$class_id = $_POST['class_id']; // From user selection

// Connect to the database
$conn = new mysqli("localhost", "root", "", "bootcamp_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert order into the database
$sql = "INSERT INTO orders (user_id, class_id) VALUES ('".$_SESSION['user_id']."', '$class_id')";

if ($conn->query($sql) === TRUE) {
    echo "Class ordered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>