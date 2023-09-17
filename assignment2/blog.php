<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please Log in First'); window.location.href='form.html';</script>";
    exit;
}
if (isset($_GET['message'])) {
    echo "<script>alert('" . htmlspecialchars($_GET['message'], ENT_QUOTES) . "');</script>";
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
$user_id = $_SESSION['user_id'];
$sql = "SELECT blog.ID, blog.Title, blog.Contents, blog.Tags, blog.Picture, blog.Time, user.Name FROM blog JOIN user ON blog.userID = user.ID WHERE user.ID = $user_id  ORDER BY blog.Time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/blog.css">
    <script src="js/blog.js" defer></script>
</head>
<body>
<div class="container bar">
    <nav class="nav">
        <div class="nav__logo"> <span>MY</span><span>BLOG</span></div>
        <div class="nav__links">
            <div class="nav__item active"><a href="index.php">Home</a></div>
            <div class="nav__item"><a href="blog.php">My Page</a></div>
            <div class="nav__item"><a href="post.html" id="loginBtn">ADD NEW POST</a></div>
            <div class="nav__item"><a href="logout.php">Sign out</a></div>
        </div>
    </nav>
</div>
    <div class='container'>
        <div class='blog-posts'>

            <?php
            if ($result && $result->num_rows > 0) {
                $count = 0;
                $featureDisplayed = false;

                while($row = $result->fetch_assoc()) {
                    $date = new DateTime($row["Time"]);
                    
                    if(!$featureDisplayed) {
                      // Feature post (first row)
                      echo "<div class='row cf'>";
                      echo getPostHTML($row, $date, true);
                      echo "</div>"; // Close row
                      $featureDisplayed = true;
                      continue;
                  }
                    
                    if ($count % 2 == 0) {
                        echo "<div class='row cf'>";
                    }

                    echo getPostHTML($row, $date);

                    if ($count % 2 == 1 || $count == $result->num_rows - 1) {
                        echo "</div>"; // Close row
                    }
                    $count++;
                }
            } else {
                echo "<p>No posts available.</p>";
            }
            function displayImage($imageData) {
                return "data:image/jpeg;base64," . base64_encode($imageData);
            }
            function getPostHTML($row, $date, $isFeatured = false) {
              $tagsHtml = "";
              $tags = explode(',', $row['Tags']); // Split the tags based on commas
              foreach($tags as $tag) {
                  $tagsHtml .= "<span class='tag'>" . htmlspecialchars(trim($tag)) . "</span> ";
              }
              $backgroundImage = displayImage($row["Picture"]); // Convert image data to base64 encoded string
              $featuredClass = $isFeatured ? ' featured' : '';
              $fontSize = $isFeatured ? '2rem' : '1.3rem';
             
   
              return "
              <div class='post$featuredClass'>
              <div class='image' style='background-image: url(\"" . htmlspecialchars($row["Picture"]) . "\")'>
                      <div class='time'>
                          <div class='date'>" . $date->format('d') . "</div>
                          <div class='month'>" . strtoupper($date->format('M')) . "</div>
                      </div>
                  </div>
                  <div class='content'>
                      <h1 style='font-size: $fontSize'><a href='#'>" . htmlspecialchars($row["Title"]) . "</a></h1>
                      <p>" . htmlspecialchars(substr($row["Contents"], 0, 100)) . "...</p>
        
                         <span class='tags'>" . $tagsHtml . "</span>
                         <div class='actions'>
                          <span class='edit'><a href='edit_post.php?post_id=" . $row["ID"] . "'>[Edit]</a></span>
                          <span class='delete'><a href='delete_post.php?post_id=" . $row["ID"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'>[Remove]</a></span>
                     </div>
        
                  </div>
              </div>";
          }
          
            ?>


        </div>
    </div>

</body>
</html>

<?php $conn->close(); ?>

