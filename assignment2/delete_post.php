<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please Log in First'); window.location.href='form.html';</script>";
    exit;
}

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "assignment2";

// Create connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    
    // Use prepared statements to delete post
    $stmt = $conn->prepare("DELETE FROM blog WHERE ID=?");
    $stmt->bind_param("i", $post_id);
    if ($stmt->execute()) {
        // Display the success message and then redirect
        echo "<script>
                alert('Post deleted successfully!');
                window.location.href='blog.php';
              </script>";
    } else {
        echo "Error deleting post!";
    }
}

$conn->close();
?>
