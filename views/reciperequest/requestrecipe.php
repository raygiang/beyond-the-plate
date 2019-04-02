
<?php

require_once 'vendor/autoload.php';

// get user from session $userid
// $role = r->checkUser($userid)
//-----------------CREATE a REQUEST
$role = 1;
  if(isset($_POST['add'])){
    // session_start();
    $user_id = $_SESSION['user_id'] = 1;
    $title = $_POST['requestTitle'];
    $content = $_POST['requestContent'];

    $db = Database::getDb();
    $r = new Requestrecipe('Recipe Request');
    $createReq = $r->addRequest($user_id, $title, $content, $db);
    if($createReq){
      //header ('Location: requestrecipe.php');
      // echo "done";
    }else{
      echo 'Something went wrong';
    }
  }

//-----------------LIST of REQUESTS

  $dbconnection = Database::getDb();
  $page = new Requestrecipe('Recipe Request');
  $listrequests = $page->getAllRequests(Database::getDb());

  ?>


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
        <?php foreach($listrequests as $request): ?>
        <tr>
          <td><?php echo $request->first_name . " " . $request->last_name; ?></td>
          <td><?php echo $request->title; ?></td>
          <td><?php echo $request->description; ?></td>
         <?php
            if($role == 1 || $role == 2){
            echo "<td><a href='views/reciperequest/editrequest.php?id=". $request->id . " class='btn btn-light btn-sm' >Edit</a></td>";
            echo "<td><a href='views/reciperequest/deleterequest.php?id=". $request->id . " class='btn btn-light btn-sm' >Delete</a></td>";
          }else{
            echo "<td><a href='views/reciperequest/userdash.php?id=". $request->id . " class='btn btn-light btn-sm' >Reply</a></td>";
          }
          ?>

         <!--  <td>
            <a href="views/reciperequest/deleterequest.php?id=<?php echo $request->id ?>" class="btn btn-light btn-sm" >Delete</a>
          </td> -->
        </tr>
        <?php endforeach; ?>
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
<!-- Form put in modal or separate page -->
<!-- Only registered users can request a recipe -->
<!-- After a request is replied it should be automatically removed from request table and an email notifying should be sent to the user -->
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
            <textarea class="form-control" name="requestContent" id="request-content" rows="max" data-error="Please enter title." required></textarea>
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
