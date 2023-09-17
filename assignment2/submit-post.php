<?php
session_start();
$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "assignment2";

$conn = new mysqli($server_name, $user_name, $password, $database_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to post.";
    exit;
}

$title = isset($_POST['Title']) ? $_POST['Title'] : "";
$contents = isset($_POST['Contents']) ? $_POST['Contents'] : "";
$tag = isset($_POST['Tags']) ? implode(',', $_POST['Tags']) : '';
$picture = isset($_FILES['Picture']) ? $_FILES['Picture']['tmp_name'] : NULL;
$picture_blob = NULL;


if ($picture) {
    $picture_data = file_get_contents($picture);
    $picture_blob = 'data:image/jpeg;base64,' . base64_encode($picture_data);
}
if (empty($title) || empty($contents)) {
    echo "Title or contents cannot be empty.";
    exit;
}

// Insert into database
$sql = "INSERT INTO blog (Time, Title, Contents, Tags, Picture, userID) VALUES (NOW(), ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $title, $contents, $tag, $picture_blob, $_SESSION['user_id']);

if ($stmt->execute()) {
    echo "New post created successfully";
    header("Location: blog.php"); 
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
