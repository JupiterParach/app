<?php
  session_start();

  $_SESSION['greeting2'] = "Welcome back, Dave!";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Session #2</title>
  </head>
  <body>
    <h1><?php echo $_SESSION['greeting']; ?></h1>
  </body>
</html>
