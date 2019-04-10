<?php
	class Comment
	{
		private $id;
		private $recipe_id;
		private	$comment;
		private	$user_id;
		private $is_deleted;
		private $created_date;	
		private $modified_date;

		public function __construct()
		{
			
		}

		public function addComments($rid,$userid,$comment,$db)
		{
			$sql = "INSERT INTO comments(recipe_id,comment,user_id,is_deleted,created_date,modified_date) 
			VALUES(:recipe_id,:comment,:user_id,:0,:created_date,:modified_date)";
			$time=time();
			$pst = $db->prepare($sql);
			$pst->bindParam(':recipe_id',$rid);
			$pst->bindParam(':comment',$comment);
			$pst->bindParam(':user_id',$userid);
			$pst->bindParam(':description',$description);
			$pst->bindParam(':category',$category);
			$pst->bindParam(':created_date',$time);
			$pst->bindParam(':modified_date',$time);
			$count = $pst->execute();
			return $count;
		}

	}
?>