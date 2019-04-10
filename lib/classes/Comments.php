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
			$time=time();
			$is_deleted=0;
			$created_date=$time;
			$modified_date=$time;
		}


	}
?>