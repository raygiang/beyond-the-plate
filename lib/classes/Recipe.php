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
		public function getCategories($db)
		{
			$sql = "SELECT * FROM categories";
			$pdostm = $db->prepare($sql);
			$pdostm->execute();
			$categories=$pdostm->fetchAll(PDO::FETCH_OBJ);
			return $categories;
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


	}
?>