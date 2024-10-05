<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $confirm = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "bootcamp_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the database
    $sql = "INSERT INTO users (name, email, password, confirm) VALUES ('$name', '$email', '$password', '$confirm')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <label for="exampleInputNama">Name</label>
    <input type="text" id="exampleInputNama" placeholder="Enter name" name="name">
  </div>
    <div>
    <label for="exampleInputNama">Email</label>
    <input type="email" id="exampleInputNama" placeholder="Enter email" name="email">
  </div>
    <div>
    <label for="exampleInputNama">Password</label>
    <input type="password" id="exampleInputNama" placeholder="Enter password" name="password">
    </div>
    <div>
    <label for="exampleInputNama">Confirm password</label>
    <input type="password" id="exampleInputNama" placeholder="Enter password" name="confirm">
    </div>
  <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</body>
</html>