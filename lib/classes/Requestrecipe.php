<?php

class Requestrecipe extends Page
{
    public function __construct($title, $custLinks=null)
    {
        parent::__construct($title, $custLinks);
    }


    public function getAllRequests($db){

		$sql = "SELECT firstname, lastname, title, description FROM user
		INNER JOIN requestrecipe ON user.id = requestrecipe.user_id";
		$pdostm = $db->prepare($sql);
		$pdostm->execute();
		$requests = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $requests;
	}



	public function addRequest($title, $description, $db){

		$sql = "INSERT INTO requestrecipe (title, description)
		VALUES (:title, :description) WHERE id = :id";

		$pst = $db->prepare($sql);

		$pst->bindParam(':title', $title);
		$pst->bindParam(':description', $description);

		$count = $pst->execute();
		return $count;


	}

	public function editRequest($id, $firstname, $lastname, $title, $description, $db){

		$sql = "UPDATE requests SET firstname = :firstname, lastname = :lastname, title = :title, description = :description WHERE id = :id";

		$pst = $db->prepare($sql);


		$pst->bindParam(':firstname', $firstname);
		$pst->bindParam(':lastname', $lastname);
		$pst->bindParam(':title', $title);
		$pst->bindParam(':description', $description);
		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;

	}

	public function deleteRequest($id, $db){

		$sql = "DELETE FROM requestrecipe
		WHERE id = :id";

		$pst = $db->prepare($sql);

		$pst->bindParam(':id', $id);

		$count = $pst->execute([':id' => $id]);
		return $count;

	}


  public function displayRequestRecipe() {
      require_once 'views/requestrecipe.php';
  }
}
?>