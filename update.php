<?php
  if (!empty($_GET['taskName'])) {
    $currentTask = $_REQUEST['taskName'];
  }
  $title = 'Edit "' . $currentTask . '"?';
  include "includes/header.php";

  if (!empty($_GET['taskID'])) {
    $taskID = $_REQUEST['taskID'];
  }


  if (isset($_POST['updateTask'])) {
    editTask();
  }
?>

<form action="update.php" method="post">
  <input type="hidden" name="taskID" value="<?php echo $taskID; ?>">
  <h2>Edit task</h2>
  <input type="text" name="newTask" value="<?php echo $currentTask ?>" required>
  <input type="submit" name="updateTask" value="Update">
  <a href="index.php">Back</a>
</form>
</body>
</html>
