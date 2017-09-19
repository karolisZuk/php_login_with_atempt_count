<?php
      include 'register.php';
      include 'login.php';
      if(isset($_SESSION["username"])){header("location:entry.php");}
?>

<!DOCKTYPE html>
<html>
<head>
  <title>Testinė užduotis VDU darbui</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2>Login / Register</h2>
  <br />

  <?php
    if(isset($_GET["action"])=="login")
      {
    ?>
    <h3>Login</h3>
    <br />
    <form method="post">
      <label for="username">Enter Username</label>
      <input id="username" type="text" name="username" class="form-control" />
      <label for="password">Enter Password</label>
      <input id="password" type="password" name="password" class="form-control" />
      <input type="submit" name="login" <?php if (!getButtonStatus ()){ ?> disabled <?php   } ?> value="Login" class="btn btn-info" />
    </form>
    <br />
    <p><a href="index.php">Register</a></p>
    <?php
  } else { ?>

  <h3>Register</h3>
  <br />
  <form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control" />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" />
    <input type="submit" class="btn btn-info" type="submit" name="register" />
  </form>
      <p><a href="index.php?action=login">Login</a></p>
  <?php } ?>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
