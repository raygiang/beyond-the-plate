<div class="page-wrapper">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-recipe-tab" data-toggle="pill" href="#pills-recipe" role="tab" aria-controls="pills-home" aria-selected="true">My Recipes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-mealplan-tab" data-toggle="pill" href="#pills-mealplan" role="tab" aria-controls="pills-mealplan" aria-selected="false">My Mealplans</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-recipe" role="tabpanel" aria-labelledby="pills-recipe-tab">
  	<hr/>
  	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#newRecipeModal">
	  Add New Recipe
	</button>

	<!-- Modal -->
	<div class="modal fade" id="newRecipeModal" tabindex="-1" role="dialog" aria-labelledby="newRecipeModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<form action="" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New Recipe</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="container">
								  <input type="file" id="uploadFile" name="uploadFile[]" multiple/>
								<br/>
							  	<div id="image_preview"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<label>Recipe Name</label>
									<input type="text" class="form-control" name="recipeName" id="recipeName">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<label>Recipe Description</label>
									<input type="text" class="form-control" name="recipeDescription" id="recipeDescription">
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<label>Recipe Category</label>
									<select name="recipeCategory" id="recipeCategory" class="form-control">
										<option value="">Select Category</option>
									<?php
										$r=new Recipe();
										$categories=$r->getCategories($db);
										foreach($categories as $category)
										{
											$str.="<option value='".$category->id."'>".$category->name."</option>";
										}
										echo $str;
									?>
									</select>
								</div>


							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<h5 class="modal-title" id="exampleModalLabel">Add Instructions</h5>
							<input type="button" name="add_item" value="+" class="btn btn-success" onClick="addMore();" />
							<input type="button" name="del_item" value="-" class="btn btn-danger" onClick="deleteRow();" />
							<div id="product">
								<?php require_once("input.php") ?>
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
	     	</form>
	    </div>
	  </div>
	</div>

  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  	Profile
  </div>
  <div class="tab-pane fade" id="pills-mealplan" role="tabpanel" aria-labelledby="pills-mealplan-tab">
  	Mealplan
  </div>
</div>
</div>