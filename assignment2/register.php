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


    if (empty($name) || empty($email) || empty($password)) {
        echo "Name, email, and password fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
        exit;
    }

    if ($password !== $password2) {
        echo "Passwords do not match!";
        exit;
    }

    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        echo "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.";
        exit;
    }

    // Check if email already exists in the database
    $checkEmailSql = "SELECT email FROM user WHERE email = ?";
    $checkStmt = $conn->prepare($checkEmailSql);
    $checkStmt->bind_param('s', $email);
    $checkStmt->execute();
    $checkStmt->store_result();
    if ($checkStmt->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
        exit;
    }
    $checkStmt->close();

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Insert into the database
    $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";

  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "New record created successfully. You can now <a href='form.html'>login</a>.";
        
    } else {
        echo "An error occurred. Please try again.";
    }

    $stmt->close();
    $conn->close();
}

?>
