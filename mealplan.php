<?php
  session_start();
  $_SESSION['user_id'] = 1;

  require_once 'vendor/autoload.php';
  require_once 'config.php';
  date_default_timezone_set('Canada/Eastern');

  $page = new Mealplan(Database::getDb(), 'Meal Plan', getdate(), $_SESSION['user_id']);

  if(isset($_POST['move_submit'])) {
    $page->movePlan($_POST['plan_id'], strtotime($_POST['new_date']));
  }

  if(isset($_POST['delete_plan'])) {
    $page->deletePlan($_POST['plan_id']);
  }

  // $page->addPlan(2, time(), 2);
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <?= $page->generateHeader(); ?>
  <main id="main">
    <div class="page-wrapper">
      <h2>Meal Plan</h2>
      <select id="month-select" name="month-select">
      </select>
      <div id="calendar-area" class="table-container">
        <?php $page->displayMealPlanContent(); ?>
      </div>
    </div>

    <div class="modal fade" id="planModal" tabindex="-1" role="dialog" aria-labelledby="planModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="planModalTitle">Plan Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="plan-info" class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div id="test"></div>
  <?= $page->generateFooter(); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?= SCRIPTS ?>mealplan.js"></script>
</body>
</html>