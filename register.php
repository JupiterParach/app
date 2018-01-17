<?php
  if (isset($_POST['register'])) {
    $connection = mysqli_connect('localhost', 'admin2', 'Sg3yIelTvsAmx2RE', 'db_app');
    if ($connection) {
    }
    else {
      die('Database connection failed!');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    if (strlen($username) > 32) { // Alerts if username is too long
      echo "<script type='text/javascript'>alert('Invalid username. Username must be less than 32 characters');</script>";
    }
    elseif (strlen($password) < 4) {
      echo "<script type='text/javascript'>alert('Password must be atleast 4 characters long');</script>";
    }

    elseif (strlen($username) <= 32) {
      $query = "SELECT * FROM users WHERE username = '{$username}' ";
      $select_user_query = mysqli_query($connection, $query);

      if (!$select_user_query) {
        die('Query failed') . mysql_error($connection);
      }
      $db_username = '';
      while ($row = mysqli_fetch_array($select_user_query)) {
        $db_username = $row['username'];
      }

      if ($db_username !== $username) {

        $password = hash('sha256', $password);

        $query = "INSERT INTO users(username, password)"; // Vart vi lägger in det
        $query .= "VALUES ('$username', '$password')"; // VAD vi lägger in

        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("Query failed!" . mysqli_error());
        }
        echo "<script type='text/javascript'>alert('Registration successful');</script>";
      }
      else { // Alerts if the username is already in use
        echo "<script type='text/javascript'>alert('Registration failed. Username already taken!');</script>";
      }
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
