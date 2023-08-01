<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "assignment2";

$connection = new mysqli($server_name, $user_name, $password, $database_name) or die($connection->connect_error);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $email = mysqli_real_escape_string($connection, $_POST['Email']);
    $password = mysqli_real_escape_string($connection, $_POST['Password']); 

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
      
    } else {
       
    }
}
?>
