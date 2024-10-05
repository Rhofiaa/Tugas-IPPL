<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "bootcamp_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the user in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <div>
    <label for="exampleInputNama">Email</label>
    <input type="email" id="exampleInputNama" placeholder="Enter email" name="email">
  </div>
    <div>
    <label for="exampleInputNama">Password</label>
    <input type="password" id="exampleInputNama" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</body>
</html>
