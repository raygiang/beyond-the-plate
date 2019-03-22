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
		public function addRecipe($name,$user_id,$description,$category,$db)
		{
			$sql = "INSERT INTO recipes VALUES(name,user_id,description,category,is_deleted,created_date,modified_date) 
			VALUES (:name,:user_id,:description,:category,:is_deleted,:created_date,:modified_date)";
			$pst = $db->prepare($sql);
			$pst->bindParam(':name',$name);
			$pst->bindParam(':user_id',$user_id);
			$pst->bindParam(':description',$description);
			$pst->bindParam(':category',$category);
			$pst->bindParam(':is_deleted',0);
			$pst->bindParam(':created_date',time());
			$pst->bindParam(':modified_date',time());
			$count = $pst->execute();
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