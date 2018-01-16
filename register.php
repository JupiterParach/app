<?php
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $connection = mysqli_connect('localhost', 'admin2', 'Sg3yIelTvsAmx2RE', 'db_app');

    if ($connection) {
    }
    else {
      die('Database connection failed!');
    }
    if (strlen($username) <= 32) {

      $query = "SELECT username FROM users WHERE username = '{$username}' ";
      $select_user_query = mysqli_query($connection, $query);

      if (!$select_user_query) {
        die('Query failed') . mysql_error($connection);
      }

      while ($row = mysqli_fetch_array($select_user_query)) {
        $db_username = '';
        $db_username = $row['username'];
      }

      if (!$db_username === $username) {

        $hashFormat = "$2y$10$";
        $salt = "Encrypted";

        $hashAndSalt = $hashFormat . $salt;

        $password = crypt($password, $hashAndSalt);

        $query = "INSERT INTO users(name, password)"; // Vart vi lägger in det
        $query .= "VALUES ('$username', '$password')"; // VAD vi lägger in

        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("Query failed!" . mysqli_error());
        }
        echo "<script type='text/javascript'>alert('Registration successful');</script>";
      }
      else {
        echo "<script type='text/javascript'>alert('Registration failed');</script>";
      }

    }
    else { // Alerts if username is too long
      echo "<script type='text/javascript'>alert('Invalid username. Username must be less than 32 characters');</script>";
    }
  }

  $title = "Register";
  include "includes/header.php";
?>

  <body>
    <form class="" action="register.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="register" value="Register">
    </form>
  </body>
</html>
