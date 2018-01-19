<?php
  $title = "Register";
  include "includes/header.php";
  if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (usernameExists($username)) {
      echo '<script>alert("Username already taken")</script>';
    }
    elseif (usernameTooLong($username)) {
      echo '<script>alert("Username too long")</script>';
    }
    elseif (passwordTooShort($password)) {
      echo '<script>alert("Password must be more than 4 characters long")</script>';
    }
    else {
      // Escape quotes
      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);

      $password = hash('sha256', $password);

      // SQL Query
      $query = "INSERT INTO users(username, password) ";
      $query .= "VALUES ('$username', '$password')";

      $result = mysqli_query($connection, $query);
      if (!$query) {
        die("query failed!") . mysqli_error($connection);
      }

      header("Location: index.php");
    }
  }

?>

    <form class="login animated fadeInDown" action="register.php" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input id="registerPage" type="submit" name="register" value="Register">
      <a href="login.php"><input type="button" name="back" value="Back"></a>
    </form>
  </body>
</html>
