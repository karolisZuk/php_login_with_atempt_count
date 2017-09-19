<?php
require 'connect.php';

if(!isset($_SESSION)){
   session_start();
}
if(isset($_POST["register"])){
  if(empty($_POST["username"]) || empty($_POST["password"]))
  {
    echo '<script>alert("Both fields are required")</script>';
  } else{
    //no sql injection for you.
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
    //write to db
    if(mysqli_query($connect, $query))
    {
      echo '<script>alert("Registration done")</script>';
    }

  }
}
 ?>
