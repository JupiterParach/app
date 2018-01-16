<?php
  session_start();
  $cookie_name = "visited";
  setcookie($cookie_name, 'not first time', time() + (86400 * 30), "/");

  $title = "Welcome";
  include "includes/header.php"
  ?>

    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <?php
    if (!isset($_COOKIE[$cookie_name])) {
      echo  '<div id="welcome">
      <h2>Hello. first time visitor!</h2>
      </div>';
    }
    ?>

  </body>
</html>
