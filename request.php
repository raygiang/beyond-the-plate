<?php
  session_start();
  //$_SESSION['user_id']=1;

  require_once('lib/controllers/request-controller.php');
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $request->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <?php echo $request->generateHeader();?>
<main id="main">
  <div id="banner">
    <p class="banner-content-request">Request a Recipe</p>
    <img id="banner-image" src="images/homepage-categories/appetizer-dark-delicious-326279.jpg" alt="Picture of table with salad">
  </div>
   <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addRequest" id="addReq">
    Add a Request
  </button>
  <div class="page-wrapper flex-container">
    <div class="col-12 col-md-10">
     <table class="table" id="request-tbl">
      <thead>
        <tr>
          <th>Name</th>
          <th>Meal Title</th>
          <th>Meal Description</th>
        </tr>
      </thead>
       <tbody>
            <?php echo printTable($request); ?>
       </tbody>
      </table>
    </div>
    <aside id=" request-sidebar">
      <ul id="sidebar-nav">
        <a href="#"><li>Request a Recipe</li></a>
        <a href="#"><li>Create a Meal Plan</li></a>
        <a href="#"><li>Favourites List</li></a>
        <a href="#"><li>Cooking Timer</li></a>
      </ul>
    </aside>
 </div>

<div class="modal fade col-lg-6 col-md-6 col-sm-4 col-xs-4 " id="addRequest" tabindex="-1" role="dialog" aria-labelledby="addRequestTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addRequestTitle">Create a Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="POST" name="recipeRequest">
          <div class="form-group">
            <label class="col-form-label" for="request-title">Meal title:</label>
            <input type="text" class="form-control" name="requestTitle" id="request-title" data-error="Please enter title." required />
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label for="request-content">Meal description:</label>
            <textarea class="form-control" name="requestContent" id="request-content" rows="max" data-error="Please enter description." required></textarea>
            <div class="help-block with-errors"></div>
          </div>
          <button type="submit" class="btn btn-secondary" name="add" id="btn">Add Request</button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</main>

  <?php
    echo $request->generateFooter();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="
  sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?= SCRIPTS ?>main.js"></script>
</body>
</html>