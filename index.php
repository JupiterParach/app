<?php
  $title = "Welcome";
  session_start();
  $cookie_name = "visited";
  setcookie($cookie_name, 'not first time', time() + (86400 * 30), "/");

  ?>

  <?php if (isset($_SESSION['username'])): ?>
    <?php
      $title = $_SESSION['username'];
      include "includes/header.php";
      if (isset($_POST['addTask'])) {
        addTask();
      }
    ?>
    <nav>
      <a href="logout.php">Log out</a>
      <h1><?php echo $_SESSION['username']; ?></h1>
    </nav>

    <section>
      <h2>Todo:</h2>
      <ul>
        <li>Pay the bills</li>
        <li>Cook food</li>
        <li>Walk the dog</li>
      </ul>
      <form action="index.php" method="post">
        <input type="text" name="taskName">
        <input type="submit" name="addTask" value="Add task">
      </form>
    </section>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
      echo  '<div id="welcome">
      <h2>Hello. first time visitor!</h2>
      </div>';
    }
    ?>
  <?php else: ?>
    <?php
      $bodyID = "login";
      include "includes/header.php";
      if (isset($_POST['login'])) {
        echo loginUser();
        return;
      }
    ?>
    <form class="login animated fadeInDown" action="" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="login" value="Login">
      <a href="./register.php" class="fadeInDown"><input type="submit" name="register" value="Register"></a>
    </form>
  <?php endif; ?>

  </body>
</html>
