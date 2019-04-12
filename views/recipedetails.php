<?php
	require_once('lib/classes/Recipe.php');
  	require_once('lib/classes/database.php');
	$db = Database::getDb();
  	$r=new Recipe();
  	$id = $_GET["id"];
	$recipe=$r->getRecipe($id,$db);
	$images=glob("recipeimages/$id*");
	//var_dump($images);
	
	//Favourite
	//null = not logged in
	//true = logged in and favourite
	//false = logged in but not favourite
	
	$fav =null;
	if(isset($_SESSION['userid']))
		{
			$fav = $r->checkIfRecipeFav($id,$_SESSION['userid'],$db);
			/* if($fav == false)
			{
				$fav = false;
			}
			else
			{
				$fav = true;
			} */
		}
	//var_dump($fav);
?>
<div class="page-wrapper">
	<div class="row">
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<div class='row'>
				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
					<?php
						echo "<img src='$images[0]' id='primaryImage'/>";
					?>
				</div>
			</div>
			<div class='row'>
				<?php
					foreach($images as $image)
					{
						echo "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-6'>
							<img src='$image'/ class='secondaryImage'>
						</div>";					}
				?>
			</div>
			

			
			
		</div>
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<div class='recipeName'><span class='h2'><?php echo $recipe->name; ?></span>
				
				<!-- To display or hide favourite icon -->
				<?php 
					
					if($fav === false)
					{
						echo "<div class='makefavouriteRecipe'>
							<img src='./images/favRecipeIcoBefore.png' alt='Make favourite recipe'>
							<img src='./images/favRecipeIcoAfter.png' class='img-top' alt='Favourite recipe' onClick='updateFavourite(2,".$_SESSION['userid'].",".$_GET['id'].")'>
						</div><span id='favstatus'></span>";
					}else if($fav === true)
					{
						echo "<div class='favouriteRecipe'>
							<img src='./images/favRecipeIcoAfter.png' alt='Favourite recipe'>
							<img src='./images/favRecipeIcoBefore.png' class='img-top' alt='Remove Favourite recipe' onClick='updateFavourite(1,".$_SESSION['userid'].",".$_GET['id'].")'>
						</div>";
					}
				?>
			</div>
			<div class='recipeDetails'>By : <?php echo $recipe->authorfname." ".$recipe->authorlname; ?>
				<div class='rating'>					
					<?php 
					$str="";
					$rt = new Rating();
					if(isset($_SESSION["userid"])){
						$userRating = $rt->getUserRating($id,$_SESSION["userid"],$db);
					}
					else{
						$userRating = $rt->getAverageRatings($id,$db);	
					}


					for($i=1;$i<=5;$i++)
					{

						$image=$i<=$userRating?"greenstar":"greystar";

						$str.="<div id='star$i' class='star' style=\"background-image:url('images/$image.png');\" data-toggle='modal' data-target='#exampleModal$i' onMouseOver='render($i);'></div>
						<div class='modal fade' id='exampleModal$i' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
                        		<div class='modal-content'>
                        			<div class='modal-header'>
										<h3 class='modal-title' id='exampleModalLabel'>Rate $recipe->name</h3>
                                		<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    		<span aria-hidden='true'>&times;</span>
                                		</button>
                        			</div>
                        			<div class='modal-body'>
                        				<form action='' method='POST'>";
										for($j=1;$j<=$i;$j++)
		                                {
		                                    $str.="<div id='star$i' class='star' style=\"background-image:url('images/greenstar.png');\"></div>";
		                               	}
		                                for($j=1;$j<=5-$i;$j++)
		                                {
		                                	$str.="<div id='star$i' class='star' style=\"background-image:url('images/greystar.png');\"></div>";
		                                }
										$str.="<br><br>
		                            	Tell us why do feel this way for <b></b>
		                            	<textarea id='comment' name='comment' style='width:100%' rows='4'></textarea>
		                            	<input type='text' id='rating' name='rating' value='$i' class='form-control'>
		                            	<input type='text' id='recipeid' name='recipeid' value='$id' class='form-control'>
		      
									</div>
                        			<div class='modal-footer'>
                                		<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                		<button type='submit' name='sbmtBtn' class='btn btn-success' >Post Review</button>
                           	 		</div>
                           	 		</form>
                        		</div>
                        	</div>
						</div>";
					}
					echo $str;
					
					?>
				</div>
			<hr/>
			<div class='recipeIngredients'><span class='h3'>Ingredients</span><br> 
				<?php
					$ingredientStr="<ol>";
					$ingredients = $r->getIngredients($id,$db);
					foreach ($ingredients as $ingredient) {
						$ingredientStr.="<li>$ingredient->name, $ingredient->quantity $ingredient->unit</li>";
					}
					$ingredientStr.="</ol>";
					echo $ingredientStr;
				?>
			</div>
			<hr/>
			<div class='recipeInstructions'><span class='h3'>Instructions</span><br/> 
				<?php
					$instructionStr="<ol>";
					$instructions = $r->getInstructions($id,$db);
					foreach ($instructions as $instruction) {
						$instructionStr.="<li>$instruction->details</li>";
					}
					$instructionStr.="</ol>";
					echo $instructionStr;
				?>
			</div>
		</div>
	</div>
</div>

<script>
	 function updateFavourite(status,uid,rid) {
		 
		/* status 
			1 = not fav icon
			2 = fav icon
		*/
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//document.getElementById("favstatus").innerHTML = this.responseText;	
					alert(this.responseText);
					location.reload();
				 }
			};
			xmlhttp.open("GET", "favouriteRecipe.php?status="+status+"&userid="+uid+"&recipeid=" + rid, true);
			xmlhttp.send(); 
		
	}
	
/* 	var auto_refresh = setInterval( 
				function() 
					{
						//alert("aman1");
						$('#makefavouriteRecipe').load("recipeDetails.php?cid=<?php echo $id; ?>");
						$('#favouriteRecipe').load("recipeDetails.php?cid=<?php echo $id; ?>");
					}, 1000); */
</script>