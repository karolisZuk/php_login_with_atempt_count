<?php
 include 'logger.php';

if(isset($_POST["login"]))
{
  if(empty($_POST["username"]) || empty($_POST["password"]))
  {
    //start logging user behavior
    Init();
    echo '<script>alert("Both fields are required.")</script>';
  }else{
    //no sql injection for you
    $username = mysqli_real_escape_string($connect, $_POST["username"]);
    $password = mysqli_real_escape_string($connect, $_POST["password"]);
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result)){
        if(password_verify($password, $row["password"])){
          //password matched, set session variables
          $_SESSION["username"] = $username;
          header("location:entry.php");
        }else{
          Init();
          echo '<script>alert("Wrong password")</script>';
          break;
        }
      }
    }else {
      Init();
      echo '<script>alert("Wrong user name")</script>';
    }
  }
}//if isset
?>
