<?php
include 'includes/db.php';
session_start();

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $password = hash('sha256', $password);

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_query = mysqli_query($connection, $query);

  if (!$select_user_query) {
    die('Query failed') . mysql_error($connection);
  }

  while ($row = mysqli_fetch_array($select_user_query)) {
    $db_id = $row['id'];
    $db_username = $row['username'];
    $db_password = $row['password'];
  }


  if ($db_username === $username && $db_password === $password) {
    $_SESSION['username'] = $db_username;
    header("Location: welcome.php");
  }
  else {
    header("Location: login.php");
  }
}

$title = "Login";
include "includes/header.php"

 ?>
    <form class="login animated fadeInDown" action="login.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="login" value="Login">
      <a href="./register.php" class="fadeInDown"><input type="submit" name="register" value="Register"></a>
    </form>
  </body>
</html>
