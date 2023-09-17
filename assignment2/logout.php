<?php
session_start(); 

// Unset all session values
$_SESSION = array();

// Destroy the session
session_destroy();

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logout.css">
    <title>Logged Out Successfully</title>  
</head>
<body>
<div class="logout-container">
    <h1>Signed Out Successfully</h1>
    <p>You have been successfully logged out. Click the link below to return to the homepage.</p>
    <a href="index.php">Return to Homepage</a>
</div>

</body>
</html>
