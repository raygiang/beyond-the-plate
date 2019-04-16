<?php
  session_start();

  require_once('lib/controllers/result-controller.php');
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $result->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <?= $result->generateHeader(); ?>

  <main id="main">
    <div class="page-wrapper">
      <h2>Result</h2>
      <?php
        displayResult($result, $_GET['id']);
      ?>
    </div>
  </main>

  <?= $result->generateFooter(); ?>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?= SCRIPTS ?>mealplan.js"></script>
</body>
</html>