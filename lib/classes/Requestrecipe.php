<?php

class Requestrecipe extends Page
{
		private $db;

		/* Constructor function for Request
           Parameters: $db the PDO for the database */
    public function __construct($db, $title, $custLinks=null)
    {
        parent::__construct($title, $custLinks);
         $this->db = $db;
    }

		/*Method that gets full name and role from users table
		and posted requests from the recipe_requeststable
		WHERE is_deleted: 0 - means the request is not deleted */

    public function getAllRequests(){

		$sql = "SELECT first_name, last_name, role, recipe_requests.user_id, recipe_requests.id, title, description, recipe_requests.is_deleted FROM users
		INNER JOIN recipe_requests ON users.id = recipe_requests.user_id
		WHERE recipe_requests.is_deleted = 0";

		$pst = $this->db->prepare($sql);
		$pst->execute();
		$requests = $pst->fetchAll(PDO::FETCH_OBJ);
		return $requests;
	}

		/*Method that gets the request with the specific id.
		 The method is used for update functionality to
		 retrieve data that needs to be changed */

 		public function getRequest($id) {
      $sql = 'SELECT * FROM recipe_requests WHERE id = :requestId';

      $pst = $this->db->prepare($sql);
      $pst->bindParam(':requestId', $id);
      $pst->execute();

      $request = $pst->fetch();

      return $request;
 	  }

	/*Method that allows to add a new request
	Parameters: $userId - id of a user who request a recipe
							$title - the title of requested meal
							$description - short description of requested meal */

	public function addRequest($userId, $title, $description){
		$time = time();

		$sql = "INSERT INTO recipe_requests (user_id, title, description, created_date, modified_date)
		VALUES (:userId, :title, :description, :created_date, :modified_date)";

		$pst = $this->db->prepare($sql);

		$pst->bindParam(':userId', $userId);
		$pst->bindParam(':title', $title);
		$pst->bindParam(':description', $description);
		$pst->bindParam(':created_date', $time);
		$pst->bindParam(':modified_date', $time);

		$count = $pst->execute();
		return $count;


	}

/*Method that allows to edit the request
	Parameters: $requestId - id of the request that needs to be changed
							$title - the title of requested meal
							$description - short description of requested meal */

	public function editRequest($requestId, $title, $description){

		$sql = "UPDATE recipe_requests SET title = :title, description = :description WHERE id = :requestId";

		$pst = $this->db->prepare($sql);

		$pst->bindParam(':requestId', $requestId);
		$pst->bindParam(':title', $title);
		$pst->bindParam(':description', $description);


		$count = $pst->execute();
		return $count;

	}

/*Method that allows to delete the request and set is_deleted:1 - means that the request is removed
	Parameters: $requestId - id of the request that needs to be changed */

	public function deleteRequest($requestId){

		$sql = "UPDATE recipe_requests
		SET is_deleted = 1		WHERE id = :requestId";

		$pst = $this->db->prepare($sql);
		$pst->bindParam(':requestId', $requestId);

		$count = $pst->execute();
		return $count;

	}

}
?>