<?php
	class Rating
	{
		private $id;
		private $recipe_id;
		private	$user_id;
		private	$rating;
		private $is_deleted;
		private $created_date;	
		private $modified_date;

		public function __construct()
		{
			
		}

		public function addRatings($rid,$userid,$rating,$db)
		{
			$sql = "INSERT IGNORE INTO ratings(recipe_id,rating,user_id,is_deleted,created_date,modified_date) 
			VALUES(:recipe_id,:rating,:user_id,0,:created_date,:modified_date)";
			$time=time();
			$pst = $db->prepare($sql);
			$pst->bindParam(':recipe_id',$rid);
			$pst->bindParam(':rating',$rating);
			$pst->bindParam(':user_id',$userid);
			$pst->bindParam(':created_date',$time);
			$pst->bindParam(':modified_date',$time);
			$count = $pst->execute();
			return $count;
		}

		public function getAverageRatings($rid,$db)
		{
			$sql = "SELECT sum(rating) as sum,count(rating) as cnt FROM ratings where is_deleted=0 and recipe_id=:rid";
			$pdostm = $db->prepare($sql);
			$pst->bindParam(':rid',$rid);
			$pdostm->execute();
			$recipeRating=$pdostm->fetch(PDO::FETCH_OBJ);
			$averageRating=$recipeRating->sum/$recipeRating->cnt;
			return $averageRating;
		}

		public function getUserRating($rid,$userid,$db)
		{
			$sql = "SELECT rating FROM ratings WHERE recipe_id = :rid and user_id=:uid and is_deleted=0";
			$pdostm = $db->prepare($sql);
			$pst->bindParam(':rid',$rid);
			$pst->bindParam(':uid',$userid);
			$pdostm->execute();
			$recipeRating=$pdostm->fetch(PDO::FETCH_OBJ);
			if($recipeRating->rating){
				$userRating=$recipeRating->rating;
			}
			else{
				$userRating=0;
			}
			return $userRating;
		}




	}
?>