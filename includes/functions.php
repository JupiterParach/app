<?php
  function usernameExists($username) {
    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
      return true;
    } else {
      return false;
    }
  }

  function usernameTooLong($username){
    if ($username > 32) {
      return true;
    } else {
      return false;
    }
  }

  function passwordTooShort($password){
    if (strlen($password) <= 4) {
      return true;
    } else {
      return false;
    }
  }

  function loginUser() {
    global $connection;
    if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $password = hash('sha256', $password);

      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);

      $query = "SELECT * FROM users WHERE username = '{$username}' ";
      $select_user_query = mysqli_query($connection, $query);

      if (!$select_user_query) {
        die('Query failed ') . mysql_error($connection);
      }

      $db_username = "";
      while ($row = mysqli_fetch_array($select_user_query)) {
        $db_id = $row['id'];
        $db_username = $row['username'];
        $db_password = $row['password'];
      }


      if ($db_username === $username && $db_password === $password) {
        $_SESSION['id'] = $db_id;
        $_SESSION['username'] = $db_username;
        header("Location: index.php");
      }
      else {
        echo "<script type='text/javascript'>alert('Invalid password or username');</script>";
      }
    }
  }

  function addTask() {
    global $connection;

    if (isset($_POST['taskName'])) {
      if (strlen($_POST['taskName']) === 0) {
        echo "<script>alert('You need to enter a task in order to submit it')</script>";
      }
      else {
        $title = $_POST['taskName'];
        $userID = $_SESSION['id'];

        $query = "INSERT INTO tasks(title, user_id) VALUES ('$title', '$userID')";
        $select_tasklist_query = mysqli_query($connection, $query);

        if (!$select_tasklist_query) {
          die("Query failed ") . mysql_error($connection);
        }
      }
    }
  }
 ?>
