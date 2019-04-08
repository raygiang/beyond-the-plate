<?php

class Requestrecipe extends Page
{
  public function __construct($title, $custLinks=null)
  {
      parent::__construct($title, $custLinks);
  }


  public function getAllRequests($db){

		$sql = "SELECT first_name, last_name, recipe_requests.id, title, description, recipe_requests.is_deleted FROM users
		INNER JOIN recipe_requests ON users.id = recipe_requests.user_id
		WHERE recipe_requests.is_deleted = 0";

		$pdostm = $db->prepare($sql);
		$pdostm->execute();

		$requests = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $requests;
	}

	public function addRequest($user_id, $title, $description, $db){
		$time = time();

		$sql = "INSERT INTO recipe_requests (user_id, title, description, created_date, modified_date)
		VALUES (:user_id, :title, :description, :created_date, :modified_date)";

		$pst = $db->prepare($sql);

		$pst->bindParam(':user_id', $user_id);
		$pst->bindParam(':title', $title);
		$pst->bindParam(':description', $description);
		$pst->bindParam(':created_date', $time);
		$pst->bindParam(':modified_date', $time);

		$count = $pst->execute();
		return $count;


	}

	public function editRequest($id, $title, $description, $db){
		$sql = "UPDATE recipe_requests SET title = :title, description = :description WHERE id = :id";

		$pst = $db->prepare($sql);

		$pst->bindParam(':title', $title);
		$pst->bindParam(':description', $description);
		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;

	}

	public function deleteRequest($id, $db){
		$sql = "UPDATE recipe_requests
		SET is_deleted = 1		WHERE id = :id";

		$pst = $db->prepare($sql);
		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;

	}


  public function displayRequestRecipe() {
    require_once 'views/reciperequest/requestrecipe.php';
  }
}
?>