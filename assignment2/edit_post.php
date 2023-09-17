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

$post = [];

// Create connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['Title'], $_POST['Contents'], $_POST['Tags'])) {
                $picture = null;
        
                
                if (isset($_FILES['Picture']['name']) && $_FILES['Picture']['name'] != '') {
                    $target_dir = "uploads/";
                    $picture = $target_dir . basename($_FILES["Picture"]["name"]);
                    move_uploaded_file($_FILES["Picture"]["tmp_name"], $picture);
                }
        
            
                if (!$picture && isset($_POST['current_picture'])) {
                    $picture = $_POST['current_picture'];
                }

$current_picture = $post['Picture'] ?? '';

        $stmt = $conn->prepare("UPDATE blog SET Title=?, Contents=?, Tags=?, Picture=? WHERE ID=?");
        $stmt->bind_param("ssssi", $_POST['Title'], $_POST['Contents'], $_POST['Tags'][0], $picture, $_POST['post_id']);
        if ($stmt->execute()) {
            echo "<script>
                alert('Post updated successfully!');
                window.location.href='blog.php';  // Redirects to blog.php after showing the alert
            </script>";
        } else {
            echo "<script>alert('Error updating post.');</script>";
        }
        $stmt->close();
        
    }
} else {
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];
        $stmt = $conn->prepare("SELECT ID, Title, Contents, Tags, Picture FROM blog WHERE ID=?");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="css/post.css">
    <script src="js/post.js" defer></script>
</head>
<body>
<div class="container bar">
        <nav class="nav">
            <div class="nav__logo"> <span>MY</span><span>BLOG</span></div>
            <div class="nav__links">
                <div class="nav__item active"><a href="blog.php"> Back</a></div>
                <div class="nav__item"><a href="index.php">Home</a></div>
            </div>
        </nav>
    </div>
    <div id="blog">
        <h1>Edit your post</h1>
        
        <form method="POST" action="edit_post.php" enctype="multipart/form-data">
        <input type="hidden" name="current_picture" value="<?php echo htmlspecialchars($post['Picture'] ?? '', ENT_QUOTES); ?>">
            <input type="hidden" name="post_id" value="<?php echo $post['ID'] ?? ''; ?>">
            <label>Title:</label>
            <input type="text" placeholder="Name Your Post" name="Title" value="<?php echo htmlspecialchars($post['Title'] ?? '', ENT_QUOTES); ?>">
            <label>Content:</label>
            <textarea placeholder="Write Your Post" name="Contents"><?php echo htmlspecialchars($post['Contents'] ?? '', ENT_QUOTES); ?></textarea>
            
            <label>Tags:</label>
            <select name="Tags[]"  size="1">
            <option value="ASIA">ASIA</option>
        <option value="NORTH AMERICA">NORTH AMERICA</option>
        <option value="SOUTH AMERICA">SOUTH AMERICA</option>
        <option value="EUROPE">EUROPE</option>
        <option value="OCEANIA">OCEANIA</option>
        <option value="AFRICA">AFRICA</option>
    </select>

    
            <label>Current Image:</label>
            <?php if (isset($post['Picture'])): ?>
                <img src="<?php echo htmlspecialchars($post['Picture'], ENT_QUOTES); ?>" alt="Post Image" width="100">
            <?php else: ?>
                No image uploaded.
            <?php endif; ?>
            <label>Upload New Image:</label>
            <input type="file" accept="image/*" class="form-control" placeholder="Choose a profile picture" name="Picture">
            <button class="submit" type="submit">Update</button>
        </form>
    </div>
</body>


