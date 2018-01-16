<?php
$connection = mysqli_connect('localhost', 'admin2', 'Sg3yIelTvsAmx2RE', 'db_app');
if (!$connection) {
  die('Failed to connect to database ' . mysqli_error($conenction));
}
?>
