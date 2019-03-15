<main id="main">
  <div id="banner">
    <p class="banner-content-request">Request a Recipe</p>
    <img id="banner-image" src="images/homepage-categories/request-banner1.jpg" alt="Picture of cutting board with tomatoes">
  </div>
  <div class="page-wrapper flex-container">
    <!-- The table will be auto generated when the db is ready -->
    <div>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Meal title</th>
            <th>Meal description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Samantha Crowford</td>
            <td>Apple tart</td>
            <td>I am looking for the best apple tart recipe. If you have one, please share</td>
            <td>Reply</td>
          </tr>
          <tr>
            <td>Sandra May</td>
            <td>Pumpkin tart</td>
            <td>I am looking for the best pumpkin tart recipe. If you have one, please share</td>
            <td>Reply</td>
          </tr>
          <tr>
            <td>Chris Evans</td>
            <td>Vegan hamburger</td>
            <td>I am looking for a vegan humburger. If you have one, please share</td>
            <td>Reply</td>
          </tr>
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
  </div>


</main>
