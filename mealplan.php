<?php
  session_start();

  require_once 'vendor/autoload.php';
  require_once 'config.php';
  date_default_timezone_set('Canada/Eastern');

  $page = new Mealplan(Database::getDb(), 'Meal Plan', getdate(), $_SESSION['userid']);

  if(isset($_POST['add_plan'])) {
    $page->addPlan($_POST['selected_recipe'], strtotime($_POST['new_date']), $_POST['pc-dropdown']);
  }

  if(isset($_POST['move_submit'])) {
    $page->movePlan($_POST['plan_id'], strtotime($_POST['new_date']), $_POST['pc-dropdown']);
  }

  if(isset($_POST['delete_plan'])) {
    $page->deletePlan($_POST['plan_id']);
  }
?>

<main id="main">
  <div class="page-wrapper">
    <h2>Meal Plan</h2>
    <select id="month-select" name="month-select">
    </select>
    <div>
      <button id="add-plan-button" data-toggle="modal" data-target="#addModal">Add a Plan</button>
    </div>
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

  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalTitle">Add a Plan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="add-info" class="modal-body">
          <form action="#" method="post">
            <input id="selected-recipe" type="hidden" name="selected_recipe">
            <div class="form-row"><input type="text" id="recipe-search"></div>
            <div id="recipe-suggestions"></div>
            <div class="form-row"><input type='date' name='new_date'></div>
            <div class="form-row"><select name='pc-dropdown'><?= $page->getOptions($plan->pc_id) ?></select></div>
            <input type="submit" name="add_plan" value="Add Meal Plan">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</main>