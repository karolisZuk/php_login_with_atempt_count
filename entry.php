<?php
if(!isset($_SESSION)){
session_start();
}
 ?>

<!DOCKTYPE html>
<html>
<?php
//test if user is authorized to view this page.
if(!isset($_SESSION)){
   session_start();
}
if(!isset($_SESSION["username"]))
{
  header("location:index.php?action=login");
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Logged in</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1> Welcome <?php echo $_SESSION["username"] ?></h1>
    <?php echo '<label><a href="logout.php">Logout</a></label>'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
