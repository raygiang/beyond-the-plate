<?php
	require_once('lib/classes/Recipe.php');
  	require_once('lib/classes/database.php');
	$db = Database::getDb();
  	$r=new Recipe();
	$recipes=$r->getAllRecipes($db);
?>
<div class="page-wrapper">
	<div class="row">
	<?php
		$n=0;
		foreach($recipes as $recipe){
			$n++;
			echo "<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
					<a href='recipedetails.php?id=$recipe->id'>
					<div class='recipe' style=background-image:url('recipeimages/$recipe->id"."_1.jpg"."');>
						<div class='recipeOuter'>
							$recipe->name
						</div>
					</div>
					</a>
			</div>";		
			if($n==4)
			{
				echo "</div>
				<div class='row'>
						<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
							<hr/>
						</div>
				</div>
				<div class='row'>";
				$n=0;
			}
		}
	?>
	</div>
</div>