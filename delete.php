<?php
  $title = 'Delete task';
  include "includes/header.php";

  if (!empty($_GET['taskID'])) {
    $taskID = $_REQUEST['taskID']; 
  }

  if (!empty($_POST)) {
    deleteTask();
  }
?>

  <form action="delete.php" method="post">
    <input type="hidden" name="taskID" value="<?php echo $taskID; ?>">
    <h2>Are you sure you want to delete this task?</h2>
    <input type="submit" name="deleteTask" value="Yes">
    <a href="index.php">No</a>
  </form>

</body>
</html>
