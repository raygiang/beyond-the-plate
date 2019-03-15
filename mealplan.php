<?php
  require_once('lib/classes/Page.php');
  require_once('lib/classes/Mealplan.php');
  date_default_timezone_set('Canada/Eastern');

  $page = new Mealplan('Meal Plan', getdate());
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <?= $page->generateHeader(); ?>
  <main id="main">
    <div class="page-wrapper">
      <h2>Meal Plan</h2>
      <div class="table-container">
        <?= $page->displayMealPlanContent(); ?>
      </div>
    </div>
  </main>
  <?= $page->generateFooter(); ?>
</body>
</html>