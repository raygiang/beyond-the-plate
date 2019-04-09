<?php
	require_once('lib/classes/Recipe.php');
  	require_once('lib/classes/database.php');
	$db = Database::getDb();
  	$r=new Recipe();
  	$id = $_GET["id"];
	$recipe=$r->getRecipe($id,$db);
	$images=glob("recipeimages/$id*");
	//var_dump($images);
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
						</div>";
					}
				?>
			</div>
			

			
			
		</div>
		<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			<div class='recipeName'><span class='h2'><?php echo $recipe->name; ?></span></div>
			<div class='recipeDetails'>By : <?php echo $recipe->authorfname." ".$recipe->authorlname; ?>
				<div class='rating'>
					
					<?php 
					$str="";
					for($i=1;$i<=5;$i++)
					{
						$str.="<div id='star$i' class='star' style=\"background-image:url('images/greystar.png');\" data-toggle='modal' data-target='#exampleModal$i' onMouseOver='render($i);'></div>
						<div class='modal fade' id='exampleModal$i' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
                        		<div class='modal-content'>
                        			<div class='modal-header'>
										<h3 class='modal-title' id='exampleModalLabel'>Rate $recipe->name</h3>
                                		<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    		<span aria-hidden='true'>&times;</span>
                                		</button>
                        			</div>
                        			<div class='modal-body'>";
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
		                            	<textarea id='comments$i' style='width:100%' rows='4'></textarea>
									</div>
                        			<div class='modal-footer'>
                                		<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                		<button type='button' class='btn btn-success' >Post Review</button>
                           	 		</div>
                        		</div>
                        	</div>
						</div>";
					}
					echo $str;
					/*
						<div class='modal fade' id='exampleModal$i' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog' role='document' style='z-index:2000;'>
                        		<div class='modal-content'>
                            		<div class='modal-header'>
                            	    	<h3 class='modal-title' id='exampleModalLabel'>Rate $recipe->name</h3>
                                		<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    		<span aria-hidden='true'>&times;</span>
                                		</button>
                            		</div>
                            		<div class='modal-body'>
		                                <img src='$images[0]' style='height:10rem;width:10rem;border-radius:50%;'><br>Rating for <b></b> is<br>
		                                for($j=1;$j<=$i;$j++)
		                                {
		                                    //echo "<img src='images/greenstar.png'>";
		                                    echo "<div id='star$i' class='star' style=\"background-image:url('images/greenstar.png');\">";
		                                }
		                                for($j=1;$j<=5-$i;$j++)
		                                {
		                                    //echo "<img src='images/greystar.png'>";
		                                    echo "<div id='star$i' class='star' style=\"background-image:url('images/greystar.png');\">";
		                                }
		                           	 	echo "<br><br>
		                            	Tell us why do feel this way for <b></b>
		                            	<textarea id='comments$i' style='width:100%' rows='4'></textarea>
		                            </div>
                            	
                            		<div class='modal-footer'>
                                		<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                		<button type='button' class='btn btn-success' onClick=\"\">Post Review</button>
                           	 		</div>
                        		</div>
                   	 		</div>
                		</div>";
					}
					*/
					?>
				</div>
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