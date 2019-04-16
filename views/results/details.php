<?php
  session_start();

  require_once('lib/controllers/result-controller.php');
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $result->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <div class="page-wrapper">
    <h3 class="sub-head">Results</h2>

    <div>
      <a href="views/results/create.php?id=<?=$id?>" class="main-button">Create a new Result</a>
      <div>
        <?php
          displayDetails($result, $id);
        ?>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?= SCRIPTS ?>mealplan.js"></script>
</body>
</html>