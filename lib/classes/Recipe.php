<?php
	class Recipe
	{
		private $id;
		private $name;
		private $user_id;
		private $description;
		private $category;
		
		public function __construct()
		{

		}
		public function displayAllRecipes($db)
		{

		}
		public function getCategory($cid,$db){
			$sql = "SELECT name FROM categories WHERE id=:cid";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':cid',$cid);
			$pdostm->execute();
			$category = $pdostm->fetch(PDO::FETCH_OBJ);
			return $category->name;
		}
		public function getRecipe($id,$db)
		{
			$sql = "SELECT recipes.*,users.first_name AS 'authorfname',users.last_name AS 'authorlname' 
			FROM recipes
			INNER JOIN users 
			ON recipes.user_id=users.id  where recipes.is_deleted=0 and recipes.id=:id";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':id',$id);
			$pdostm->execute();
			$recipe=$pdostm->fetch(PDO::FETCH_OBJ);
			return $recipe;
		}
		public function getIngredients($id,$db)
		{
			$sql = "SELECT ingredients.*,units.unit_name AS unit 
			FROM ingredients INNER JOIN units
			ON ingredients.unit_id = units.id 
			WHERE ingredients.is_deleted=0 and recipe_id=:id";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':id',$id);
			$pdostm->execute();
			$ingredients=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $ingredients;
		}
		public function getInstructions($id,$db)
		{
			$sql = "SELECT * 
			FROM instructions  
			WHERE is_deleted=0 and recipe_id=:id
			ORDER BY step ASC";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':id',$id);
			$pdostm->execute();
			$instructions=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $instructions;
		}
		public function getAllRecipes($db)
		{
			$sql = "SELECT recipes.*,users.first_name AS 'authorfname',users.last_name AS 'authorlname' 
			FROM recipes
			INNER JOIN users 
			ON recipes.user_id=users.id  where recipes.is_deleted=0";
			$pdostm = $db->prepare($sql);
			$pdostm->execute();
			$recipes=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $recipes;
		}
		public function getCategories($db)
		{
			$sql = "SELECT * FROM categories where is_deleted=0";
			$pdostm = $db->prepare($sql);
			$pdostm->execute();
			$categories=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $categories;
		}
		public function getUnits($db)
		{
			$sql = "SELECT * FROM units where is_deleted=0";
			$pdostm = $db->prepare($sql);
			$pdostm->execute();
			$units=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $units;
		}
		public function addRecipe($id,$name,$user_id,$description,$category,$is_deleted,$db)
		{
			$sql = "INSERT INTO recipes(id,name,user_id,description,category,is_deleted,created_date,modified_date) 
			VALUES(:id,:name,:user_id,:description,:category,0,:created_date,:modified_date)";
			$time=time();
			$pst = $db->prepare($sql);
			$pst->bindParam(':id',$id);
			$pst->bindParam(':name',$name);
			$pst->bindParam(':user_id',$user_id);
			$pst->bindParam(':description',$description);
			$pst->bindParam(':category',$category);
			$pst->bindParam(':created_date',$time);
			$pst->bindParam(':modified_date',$time);
			$count = $pst->execute();
			return $count;
		}
		public function addRecipeInstructions($id,$instructions,$db)
		{
			$i=0;
			foreach($instructions as $instruction)
			{
				$sql = "INSERT INTO instructions(recipe_id,details,step,is_deleted,created_date,modified_date) 
				VALUES(:id,:details,:step,0,:created_date,:modified_date)";
				$time=time();
				$step=$i+1;
				$pst = $db->prepare($sql);
				$pst->bindParam(':id',$id);
				$pst->bindParam(':details',$instructions[$i]);
				$pst->bindParam(':step',$step);
				$pst->bindParam(':created_date',$time);
				$pst->bindParam(':modified_date',$time);
				$count = $pst->execute();
				$i++;
			}
			return $count;
		}
		
		public function addRecipeIngredients($id,$ingredients,$ingredients_qty,$ingredients_unit,$db)
		{
			$i=0;
			foreach($ingredients as $ingredient)
			{
				$sql = "INSERT INTO ingredients(name,recipe_id,quantity,unit_id,is_deleted,created_date,modified_date) 
				VALUES(:name,:id,:quantity,:unit_id,0,:created_date,:modified_date)";
				$time=time();
				$pst = $db->prepare($sql);
				$pst->bindParam(':name',$ingredients[$i]);
				$pst->bindParam(':id',$id);
				$pst->bindParam(':quantity',$ingredients_qty[$i]);
				$pst->bindParam(':unit_id',$ingredients_unit[$i]);
				$pst->bindParam(':created_date',$time);
				$pst->bindParam(':modified_date',$time);
				$count = $pst->execute();
				$i++;
			}
			return $count;
		}


		public function deleteRecipe($id,$db)
		{
			$sql = "UPDATE recipes SET is_deleted=1 WHERE id=:id";
			$pst = $db->prepare($sql);
			$pst->bindParam(':id',$id);
			$count = $pst->execute();
			return $count;
		}

		public function updateRecipe($id,$name,$description,$category,$db)
		{
			$sql = "UPDATE recipes SET name=:name,$description=:description,category=:category 
			WHERE id=:id"; 
			$pst = $db->prepare($sql);
			$pst->bindParam(':name',$name);
			$pst->bindParam(':description',$description);
			$pst->bindParam(':category',$category);
			$pst->bindParam(':modified_date',time());
			$pst->bindParam(':id',$id);
			$count = $pst->execute();
			return $count;
		}


		//Favourite Recipe
		public function checkIfRecipeFav($recipeid,$userid,$db)
		{
			$sql = "SELECT * FROM favourites where user_id=:userid and recipe_id = :recipeid and is_deleted = 0";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':userid',$userid);
			$pdostm->bindParam(':recipeid',$recipeid);
			$pdostm->execute();
			
			
			if($favourites=$pdostm->fetch(PDO::FETCH_OBJ))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function addFavouriteRecipe($recipeid,$userid,$db)
		{
			$sql = "SELECT * FROM favourites where user_id=:userid and recipe_id = :recipeid";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':userid',$userid);
			$pdostm->bindParam(':recipeid',$recipeid);
			$pdostm->execute();
			
			
			if($favourites=$pdostm->fetch(PDO::FETCH_OBJ))
			{
				//if record already exist update the status 				
				$sql = "UPDATE favourites SET is_deleted=0 WHERE user_id=:userid and recipe_id = :recipeid";
				$pst = $db->prepare($sql);
				$pst->bindParam(':userid',$userid);
				$pst->bindParam(':recipeid',$recipeid);
				$count = $pst->execute();
				return "existing updated";
			}
			else
			{
				/*
				imp: change column modified_date in favourites
				*/
				//if record doesn't exist create a new record
				$sql = "INSERT INTO favourites(recipe_id,user_id,is_deleted,created_date,modified_date) 
				VALUES(:recipe_id,:user_id,0,:created_date,:modified_date)";
				$time=time();
				$pst = $db->prepare($sql);
				$pst->bindParam(':recipe_id',$recipeid);
				$pst->bindParam(':user_id',$userid);
				$pst->bindParam(':created_date',$time);
				$pst->bindParam(':modified_date',$time);
				$count = $pst->execute();
				return "new inserted";
			}
		}
		
		public function removeFavouriteRecipe($recipeid,$userid,$db)
		{
			$sql = "SELECT * FROM favourites where user_id=:userid and recipe_id = :recipeid";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':userid',$userid);
			$pdostm->bindParam(':recipeid',$recipeid);
			$pdostm->execute();
			
			if($favourites=$pdostm->fetch(PDO::FETCH_OBJ))
			{
				//if record already exist update the status 				
				$sql = "UPDATE favourites SET is_deleted=1 WHERE user_id=:userid and recipe_id = :recipeid";
				$pst = $db->prepare($sql);
				$pst->bindParam(':userid',$userid);
				$pst->bindParam(':recipeid',$recipeid);
				$count = $pst->execute();
				return "existing updated";
			}
			else
			{
				// record does not exist				
				return "record does not exist";
			}
		}
	
		public function getAllFavRecipes($uid,$db)
		{
			$sql = "SELECT favourites.*,recipes.name 
					FROM favourites 
					INNER JOIN recipes 
					ON favourites.recipe_id=recipes.id
					where favourites.user_id=:uid and favourites.is_deleted=0";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':uid',$uid);
			$pdostm->execute();
			$recipes=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $recipes;
		}
	}
?>