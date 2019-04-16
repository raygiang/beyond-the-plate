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
		public function getRatingAndComments($rid,$db){

			$sql = "SELECT ratings.rating,ratings.comment,users.first_name,users.last_name 
			FROM ratings INNER JOIN users ON ratings.user_id = users.id WHERE ratings.recipe_id=:rid 

			ORDER BY ratings.modified_date DESC limit 0,10";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':rid',$rid);
			$pdostm->execute();
			$commentsAndRatings = $pdostm->fetchAll(PDO::FETCH_OBJ);
			return $commentsAndRatings;
		}
		public function getCategory($rid,$db){
			$sql = "SELECT categories.name FROM categories INNER JOIN recipes ON categories.id=recipes.category WHERE recipes.id=:rid";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':rid',$rid);
			$pdostm->execute();
			$category = $pdostm->fetch(PDO::FETCH_OBJ);
			return $category->name;
		}
		public function getAllCategories($db){
			$sql = "SELECT categories.id,categories.name FROM categories WHERE 1";
			$pdostm = $db->prepare($sql);
			$pdostm->execute();
			$categories = $pdostm->fetchAll(PDO::FETCH_OBJ);
			return $categories;
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
			$sql = "SELECT ingredients.*,units.name AS unit
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
		public function getCategoryRecipes($cid,$db)
		{
			$sql = "SELECT recipes.*,users.first_name AS 'authorfname',users.last_name AS 'authorlname'
			FROM recipes
			INNER JOIN users
			ON recipes.user_id=users.id  where recipes.is_deleted=0 and recipes.category=:cid";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':cid',$cid);
			$pdostm->execute();
			$recipes=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $recipes;
		}
		public function getSearchedRecipes($q,$db)
		{
			$sql = "SELECT recipes.*,users.first_name AS 'authorfname',users.last_name AS 'authorlname'
			FROM recipes
			INNER JOIN users
			ON recipes.user_id=users.id  where recipes.is_deleted=0 and recipes.name like :q";
			$pdostm = $db->prepare($sql);
			$q = "%$q%";
			$pdostm->bindParam(':q',$q,PDO::PARAM_STR);
			$pdostm->execute();
			$recipes=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $recipes;
		}
		public function getAllUserRecipes($uid,$db)
		{
			$sql = "SELECT recipes.*,users.first_name AS 'authorfname',users.last_name AS 'authorlname' 
			FROM recipes
			INNER JOIN users 
			ON recipes.user_id=users.id  where recipes.is_deleted=0 and recipes.user_id=:uid";
			$pdostm = $db->prepare($sql);
			$pdostm->bindParam(':uid',$uid);
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
		public function addRecipeInstructions($id,$instructions,$instruction_times,$db)
		{
			$i=0;
			foreach($instructions as $instruction)
			{
				$sql = "INSERT INTO instructions(recipe_id,details,step,prep_time,is_deleted,created_date,modified_date)
				VALUES(:id,:details,:step,:minutes,0,:created_date,:modified_date)";
				$time=time();
				$step=$i+1;
				$pst = $db->prepare($sql);
				$pst->bindParam(':id',$id);
				$pst->bindParam(':details',$instructions[$i]);
				$pst->bindParam(':step',$step);
				$pst->bindParam(':minutes',$instruction_times[$i]);
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

		/* Method that will return a list of all entries in the results table */
        public function listResults() {
            $sqlQuery = 'SELECT * FROM results';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->execute();

            $resultList = $pdoStatement->fetchAll(PDO::FETCH_OBJ);

            return $resultList;
        }

        /* Method that will return a specific entry from the results table
           Parameters: $id the id of the entry in question */
        public function getResult($id) {
            $sqlQuery = 'SELECT * FROM results WHERE id = :resultID';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':resultID', $id);
            $pdoStatement->execute();

            $resultList = $pdoStatement->fetch();

            return $resultList;
        }

        /* Method that will add a new result to the results table
           Parameters: $recipeID the id of the recipe that this result corresponds to
                       $userID the id of the user adding this result
                       $comment the comment for this result */
        public function addResult($recipeID, $userID, $comment) {
            $sqlQuery = 'INSERT INTO results(recipe_id, user_id, comment, created_date, modified_date)
                         VALUES (:recipeID, :userID, :comment, :createdDate, :modifiedDate)';

            $currTime = time();

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':recipeID', $recipeID);
            $pdoStatement->bindParam(':userID', $userID);
            $pdoStatement->bindParam(':comment', $comment);
            $pdoStatement->bindParam(':createdDate', $currTime);
            $pdoStatement->bindParam(':modifiedDate', $currTime);

            return $pdoStatement->execute();
        }

        /* Method that will update an existing result in the results table
           Parameters: $resultID the id of the result being updated
                       $recipeID the id of the recipe that this result corresponds to
                       $userID the id of the user that added this result
                       $comment the comment for this result
                       $currDate the date that this result was modified */
        public function updateResult($resultID, $recipeID, $userID, $comment, $currDate) {
            $sqlQuery = 'UPDATE results SET recipe_id = :recipeID, user_id = :userID, comment = :comment, modified_date = :currDate WHERE id = :resultID';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':recipeID', $recipeID);
            $pdoStatement->bindParam(':userID', $userID);
            $pdoStatement->bindParam(':comment', $comment);
            $pdoStatement->bindParam(':currDate', $currDate);
            $pdoStatement->bindParam(':resultID', $resultID);

            return $pdoStatement->execute();
        }

        /* Method that will delete (set is_deleted to 1) a result from the results table
           Parameters: $resultID the id of the result being deleted */
        public function deleteResult($resultID) {
            $sqlQuery = 'UPDATE results SET is_deleted = 1 WHERE id = :resultID';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':resultID', $resultID);

            return $pdoStatement->execute();
        }

        /* Method that will return the next available ID for the results table */
        public function getInsertID() {
            $sqlQuery = 'SELECT MAX(id)+1 from results';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->execute();
            $result = $pdoStatement->fetch();

            return $result[0];
        }
	}
?>