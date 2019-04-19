<?php
	require_once('lib/classes/Recipe.php');
  	require_once('lib/classes/database.php');
  	$db = Database::getDb();
  	$r=new Recipe();
  	$id = $_GET["recipeId"];
	$recipe=$r->getRecipe($id,$db);	

	if(isset($_POST["delBtn"])){
		if($r->deleteRecipe($id,$db)){
			header("location:userdash.php");
		}

	}
?>	
<main>
	<hr/>
	<div class="page-wrapper">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				Are you sure you want to delete <strong><?php echo $recipe->name; ?></strong>?
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<form action="" method="POST">
					<input type="submit" name="delBtn" value="Yes, I am not proud of it" class="btn btn-success"/>
				</form>
				<form action="userdash.php" method="POST">
					<input type="submit" value="No, take me back to Dashboard" take me back to Dashboard" class="btn btn-danger"/>
				</form>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				
			</div>
		</div>
	</div>
</main>
