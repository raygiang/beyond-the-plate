<?php
	require_once('lib/classes/User.php');
	require_once('lib/classes/Database.php');
	$db = Database::getDb();
	$userid = $_SESSION['userid'];
	
	$u = new User();
	$user=$u->showUserDetails($userid,$db);
	
	$fname = $user->first_name;
	$lname = $user->last_name;
?>

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
	    	<form action="addrecipe.php" method="POST" enctype="multipart/form-data" >
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add New Recipe</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div>
								  <input type="file" id="uploadFile" name="uploadfile[]" class='btn btn-primary' multiple/>
								<br/>
							  	<div id="image_preview"></div>
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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

						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<h5 class="modal-title" id="ingredientsModalLabel">Add Ingredients</h5>
							<div class="form-group">
   								<input id="ms" class="form-control" name="countries[]" value=""/>
							</div>
							<div id="ingredient">
								<?php require_once("input_ingredient.php") ?>
							</div>
							<input type="button" name="add_item" value="+" class="btn btn-success" onClick="addMore('ingredient');" />
							<input type="button" name="del_item" value="-" class="btn btn-danger" onClick="deleteRow();" />
						</div>
					</div>


					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<hr/>
							<h5 class="modal-title" id="instructionsModalLabel">Add Instructions</h5>
							<div id="instruction">
								<?php require_once("input_instruction.php") ?>
							</div>
							<input type="button" name="add_item" value="+" class="btn btn-success" onClick="addMore('instruction');" />
							<input type="button" name="del_item" value="-" class="btn btn-danger" onClick="deleteRow();" />
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="sbtBtn" class="btn btn-primary">Save changes</button>
				</div>
	     	</form>
	    </div>
	  </div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php
			$r=new Recipe();
			$recipes=$r->getAllRecipes($db);
			$str="<table class='table table-striped'><tr>
				<td>Name</td>
				<td>Description</td>
				<td>Author</td>
				<td>Ratings</td>
				<td>Actions</td>
			</tr>";
			foreach($recipes as $recipe)
			{
				$str.="<tr>
					<td>".$recipe->name."</td>
					<td>".$recipe->description."</td>
					<td>".$recipe->authorfname." ".$recipe->authorlname."</td>
					<td></td>
					<td><button class='btn btn-success'>Edit</button><button class='btn btn-danger'>Delete</button></td>
				</tr>";
			}
			echo $str."</table>";
		?>
		</div>
	</div>
  </div>
  
	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-profile-tab" data-toggle="pill"  href="#" role="tab" aria-controls="pills-home" aria-selected="true"  onClick="showGeneral('profile-password','profile-general');">General</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-profile" aria-selected="false" onClick="showPassword('profile-password','profile-general');">Change Password</a>
			</li>
		</ul>
		<div id="profile-general">
			<form id="userdetails">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label>First Name*</label>
								<input type="text" class="form-control" name="userFirstName" id="userFirstName" value="<?php
										if(isset($fname)){
											echo $fname;
										}
									?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label>Last Name*</label>
								<input type="text" class="form-control" name="userLastName" id="userLastName" value="<?php
										if(isset($lname)){
											echo $lname;
										}
									?>" required>
							</div>	
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="hidden" name="userid" id="userid" 
								value="<?php
										if(isset($userid)){
											echo $userid;
										}
									?>">
							</div>	
							
						</div>	
					</div>	
				</div>
				<div class="row">
					<button type="button" name="generalBtn" id="generalBtn" onclick="validateGeneral()" class="btn btn-primary">Save changes</button>
				</div>
				<div class="row">
					<div id="generalProfileUpdateMsg"></div>
				</div>
			</form>	
		</div>
		<div id="profile-password">
			<form id="userpassword">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label>Old Password*</label>
								<input type="password" class="form-control" name="oldPassword" id="oldPassword"required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label>New Password*</label>
								<input type="password" class="form-control" name="newPassword" id="newPassword" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label>Confirm Password*</label>
								<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
							</div>							
						</div>	
					</div>	
				</div>
				<div class="row">
					<button type="button" name="passwordBtn" onclick="validatePassword()" class="btn btn-primary">Save changes</button>
				</div>
				<div class="row">
					<div id="passwordUpdateMsg"></div>
				</div>
			</form>	
		</div>
	</div>
  
  <div class="tab-pane fade" id="pills-mealplan" role="tabpanel" aria-labelledby="pills-mealplan-tab">
  	Mealplan
  </div>
</div>
</div>

<script>
	//Profile update
	
	/* this method is used to display general div and hide password div */
	function showGeneral(pwdid,generalid){
		var pwdelement = document.getElementById(pwdid);
		var generalelement = document.getElementById(generalid);
		if(pwdelement.style.display == 'block')
		{
			pwdelement.style.display = 'none';
			generalelement.style.display = 'block';
		}
		else
			generalelement.style.display = 'block';
		
		document.getElementById("generalProfileUpdateMsg").innerHTML = "";
		$("#generalProfileUpdateMsg").removeClass("alert alert-danger");
		$("#generalProfileUpdateMsg").removeClass("alert alert-success");
	}

	/* this method is used to validate is all required fields are available.
		if yes, proceed with update
		if no, display error */
	function validateGeneral(){
		var fname = document.getElementById("userFirstName").value;
		var lname = document.getElementById("userLastName").value;
		
		if(fname == "" || lname == "" )
		{
			document.getElementById("generalProfileUpdateMsg").innerHTML = "Please fill the required fields";
			$("#generalProfileUpdateMsg").addClass("alert alert-danger");
			return false;
		}
		else
			sendGeneralData();
	}
	
	function sendGeneralData() {
		var fname = document.getElementById("userFirstName").value;
		var lname = document.getElementById("userLastName").value;
		var id = document.getElementById("userid").value;
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("generalProfileUpdateMsg").innerHTML = "Profile updated !!!";
				if(this.responseText == "Error updating profile.")
				{
				    $("#generalProfileUpdateMsg").removeClass("alert alert-success");
					$("#generalProfileUpdateMsg").addClass("alert alert-danger");
				}else{
					$("#generalProfileUpdateMsg").removeClass("alert alert-danger");
				    $("#generalProfileUpdateMsg").addClass("alert alert-success");
				}
            }
        };
        xmlhttp.open("GET", "updateuser.php?generalBtn=1&userid="+id+"&userFirstName=" + fname+"&userLastName="+lname, true);
        xmlhttp.send();
	}
	
	// Profile Password Changes
	
	/* this method is used to display password div and hide general div */
	function showPassword(pwdid,generalid){
		var pwdelement = document.getElementById(pwdid);
		var generalelement = document.getElementById(generalid);
		if(pwdelement.style.display == 'none')
		{
			pwdelement.style.display = 'block';
			generalelement.style.display = 'none';
		}
		else
		{
			pwdelement.style.display = 'block';
			generalelement.style.display = 'none';
		}
		
		$("#passwordUpdateMsg").removeClass("alert alert-danger");
		$("#passwordUpdateMsg").removeClass("alert alert-success");
	}
	
	/* this method is used to validate is all required fields are available.
		if yes, proceed with update
		if no, display error */
	function validatePassword(){
		var oldpwd = document.getElementById("oldPassword").value;
		var newpwd = document.getElementById("newPassword").value;
		var confirmpwd = document.getElementById("confirmPassword").value;
		
		if(oldpwd == "" || newpwd == "" || confirmpwd =="")
		{
			document.getElementById("passwordUpdateMsg").innerHTML = "Please fill the required fields";
			$("#passwordUpdateMsg").addClass("alert alert-danger");
			return false;
		}else if(newpwd != confirmpwd)
		{
			document.getElementById("passwordUpdateMsg").innerHTML = "New Password & Confirm Password do no match";
			$("#passwordUpdateMsg").addClass("alert alert-danger");
			return false;
		}
		else
			sendPasswordData();
	}
	
	function sendPasswordData() {
		var oldpwd = document.getElementById("oldPassword").value;
		var newpwd = document.getElementById("newPassword").value;
		var id = document.getElementById("userid").value;
		
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("passwordUpdateMsg").innerHTML = "Password updated !!!";
                document.getElementById("passwordUpdateMsg").innerHTML = this.responseText;
				if(this.responseText == "Old Password incorrect")
				{
				    $("#passwordUpdateMsg").removeClass("alert alert-success");
					$("#passwordUpdateMsg").addClass("alert alert-danger");
				}else{
					$("#passwordUpdateMsg").removeClass("alert alert-danger");
				    $("#passwordUpdateMsg").addClass("alert alert-success");
				}
			 }
        };
        xmlhttp.open("GET", "updateuser.php?passwordBtn=1&userid="+id+"&oldPassword=" + oldpwd+"&newPassword="+newpwd, true);
        xmlhttp.send();
	}
</script>