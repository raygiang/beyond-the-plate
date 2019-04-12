<?php
	session_start();
	require_once('lib/classes/Recipe.php');
	require_once('lib/classes/database.php');
	$db = Database::getDb();
  
	if(isset($_GET['status']))
	{
		//var_dump($_GET);
		$status = $_GET['status'];
		$userid=$_GET['userid'];
		$recipeid=$_GET['recipeid'];

		$r = new Recipe();
		
		if($status == 1)
		{
			//remove favourite recipe
			$count=$r->removeFavouriteRecipe($recipeid,$userid,$db);
			if($count === "existing updated")
				{
					echo "Removed from Favourite" ; //Existing updated
				}else if($count === "record does not exist")
					{
						echo "Not your favourite recipe" ; //record does not exist
					} else 
						{
							echo "Error";//Database related error
						}
		} else if($status == 2)
			{
				//add favourite recipe
				$count=$r->addFavouriteRecipe($recipeid,$userid,$db);
				if($count === "existing updated")
					{
						echo "Added to Favourite" ; //Existing updated
					}else if($count === "new inserted")
						{
							echo "Added to Favourite" ; //New added
						} else 
							{
								echo "Error";//Database related error
							}
			}
	}
?>