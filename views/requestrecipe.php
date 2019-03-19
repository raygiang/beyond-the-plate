
<?php

require_once('lib/classes/Database.php');
  $dbconnection = Database::getDb();
  $page = new Requestrecipe('Recipe Request');
  $listrequests = $page->getAllRequests(Database::getDb());


// public function displayRequestTable(){

  //  $htmltable = '';
  //  $htmltable .= "<table><thead><tr><th>Name</th><th>Meal Title><</th><th>Meal Description></th></tr></thead><tbody><tr>";
  //    foreach($this->getAllRequests($this->db) as $row){
  //      $htmltable .= "<td>" . $row->firstname . $row->lastname."</td>";
  //      $htmltable .= "<td>" . $row->title ."</td>";
  //      $htmltable .= "<td>" . $row->description ."</td>";
  //      $htmltable .= "</tr></tbody></table>";
  //  }

  //  return $htmltable;
  // }
  ?>
<main id="main">
  <div id="banner">
    <p class="banner-content-request">Request a Recipe</p>
    <img id="banner-image" src="images/homepage-categories/request-banner1.jpg" alt="Picture of cutting board with tomatoes">
  </div>
  <div class="page-wrapper flex-container">
    <!-- The table will be auto generated when the db is ready -->
    <div>
     <table class="table table-hover">
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
          <td><?php echo $request->firstname . " " . $request->lastname; ?></td>
          <td><?php echo $request->title; ?></td>
          <td><?php echo $request->description; ?></td>
          <td><a href="edit.php?id=<?php echo $request->id ?>" class="btn btn-info">Edit</a>
              <a href="delete.php?id=<?php echo $request->id ?>" class="btn btn-danger">Delete</a>
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
<div>
  <form action="#" method="POST" name="recipeRequest">
    <!-- Name should be generated automatically where user id = :id -->
    <!-- <div class="form-group">
      <label class="col-form-label" for="uName">Name:</label>
      <input type="text" class="form-control" name="uName" id="uName">
    </div> -->
    <div class="form-group">
      <label class="col-form-label" for="rTitle">Meal title:</label>
      <input type="text" class="form-control" name="rTitle" id="rTitle">
    </div>
    <div class="form-group">
      <label for="rContent">Meal description:</label>
      <textarea class="form-control" name="rContent" id="rContent" rows="max"></textarea>
      <button type="submit" class="btn btn-secondary" name="add" id="btn">Add Request</button>
    </div>
  </form>
</div>

</main>
