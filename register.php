<?php

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "assignment2";

// Correct the variable name from $connection to $conn
$conn = new mysqli($server_name, $user_name, $password, $database_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gather form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['pass2'];

    if ($password !== $password2) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password - very important for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";

    // Using prepared statements to protect against SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
