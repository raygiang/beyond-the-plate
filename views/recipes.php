<?php
	require_once('lib/classes/Recipe.php');
  	require_once('lib/classes/database.php');
	$db = Database::getDb();
  	$r=new Recipe();
	$recipes=$r->getAllRecipes($db);
	$categories=$r->getAllCategories($db);
	$rt = new Rating();


	$filterHTML="<div class='row' id='filter'>
		<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
		<h3>Filter Recipes</h3>";
		foreach($categories as $category)
		{
			$filterHTML.="<div><input type='checkbox' value='$category->name'> $category->name</div>";
		}
		$filterHTML.="</div>
	</div>";

	$n=0;
	$recipeHTML="";
	foreach($recipes as $recipe){
		$images=glob("recipeimages/$recipe->id*");
		$n++;
		$str="";
		$userRating = $rt->getAverageRatings($recipe->id,$db);
		$category = $r->getCategory($recipe->id,$db);
		for($i=1;$i<=5;$i++)
		{
			$image=$i<=$userRating?"greenstar":"greystar";
			$str.="<div class='star' style=\"background-image:url('images/$image.png');\"></div>";
		}

		$recipeHTML.="<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
				<a href='recipedetails.php?id=$recipe->id'>
				<div class='recipe' style=background-image:url('$images[0]');>
					<div class='recipeOuter'>
						$recipe->name<br><span class='category'>$category</span><br>$str
					</div>
				</div>
				</a>
		</div>";		
		if($n==3)
		{
			$recipeHTML.="</div>
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
<div class="page-wrapper">
	<div class="row">
		<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
			<?php  
				echo $filterHTML;
			?>
		</div>
		<div class='col-lg-9 col-md-9 col-sm-12 col-xs-12'>
			<div class='row'>
			<?php
				echo $recipeHTML;
			?>
			</div>
		</div>
	</div>
</div>