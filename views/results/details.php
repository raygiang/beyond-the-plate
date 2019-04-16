<?php
  session_start();

  require_once('lib/controllers/result-controller.php');
?>

<h3 class="h3">Results</h3>

<div>
  <?php
    if(isset($_SESSION['userid'])) {
      echo "<a href='views/results/create.php?id=$id'>Create a new Result</a>";
    }
  ?>
  <div>
    <?php
      displayDetails($result, $id);
    ?>
  </div>
</div>