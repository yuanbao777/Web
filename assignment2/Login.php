<?php
session_start();

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "assignment2";

// Establish connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['Email']);
    $password = $conn->real_escape_string($_POST['Password']);

    // Update SQL query to select both ID and password for the given email
    $sql = "SELECT ID, password FROM user WHERE email = ?";
  
    // Use the connection to prepare the statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashedPassword);
        $stmt->fetch();

        // Use password_verify to check the password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id'] = $user_id;
    
            // Redirect to blog.php
            header("Location: blog.php");
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();
?>
