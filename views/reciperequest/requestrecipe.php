
<?php
//-----------------CREATE a REQUEST
  if(isset($_POST['add'])){
    $title = $_POST['requestTitle'];
    $content = $_POST['requestContent'];

    $db = Database::getDb();
    $r = new Requestrecipe('Recipe Request');
    $createReq = $r->addRequest(1, $title, $content, $db);
    if($createReq){
      //header ('Location: requestrecipe.php');
      // echo "done";
    }else{
      echo 'Something went wrong';
    }
  }

//-----------------LIST of REQUESTS
require_once('lib/classes/Database.php');
  $dbconnection = Database::getDb();
  $page = new Requestrecipe('Recipe Request');
  $listrequests = $page->getAllRequests(Database::getDb());
  ?>
<main id="main">
  <div id="banner">
    <p class="banner-content-request">Request a Recipe</p>
    <img id="banner-image" src="images/homepage-categories/appetizer-dark-delicious-326279.jpg" alt="Picture of table with salad">
  </div>
  <button type="submit" class="btn btn-secondary"  id="create-modal-btn">Add Request</button>
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
          <td><a href="views/reciperequest/editrequest.php?id=<?php echo $request->id ?>" class="btn btn-light btn-sm" >Edit</a>
              <a href="views/reciperequest/deleterequest.php?id=<?php echo $request->id ?>" class="btn btn-light btn-sm" >Delete</a>
          </td>
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

<div class="col-12 col-md-4" id="create-modal">
  <div class="modal-content">
    <span class="close">&times;</span>
      <form action="" method="POST" name="recipeRequest">
        <div class="form-group">
          <label class="col-form-label" for="request-title">Meal title:</label>
          <input type="text" class="form-control" name="requestTitle" id="request-title">
        </div>
        <div class="form-group">
          <label for="request-content">Meal description:</label>
          <textarea class="form-control" name="requestContent" id="request-content" rows="max"></textarea>
        </div>
        <button type="submit" class="btn btn-secondary" name="add" id="btn">Add Request</button>
      </form>
    </div>
</div>
</main>
