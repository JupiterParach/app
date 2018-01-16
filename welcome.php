<?php
  session_start();
  $cookie_name = "visited";
  setcookie($cookie_name, 'not first time', time() + (86400 * 30), "/");

  $title = "Welcome";
  include "includes/header.php"
  ?>

  <?php if ($_SESSION): ?>

    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Log out <?php echo $_SESSION['username']; ?></a>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
      echo  '<div id="welcome">
      <h2>Hello. first time visitor!</h2>
      </div>';
    }
    ?>
  <?php else: ?>
    <h1>Login not detected</h1>
  <?php endif; ?>

  </body>
</html>
