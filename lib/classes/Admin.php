<?php
class Admin

{
	private $id;
	private $email;
	private $password;
	private $firstname;
	private $lastname;
	private $role;

	public function __construct()
	{


	}


public function getAllUserRecipes($db){
		$sql = "SELECT users.id, first_name, last_name, email, last_login, COUNT(recipes.user_id) AS number FROM users
		LEFT JOIN recipes ON users.id = recipes.user_id
		GROUP BY recipes.user_id";
		$pdostm = $db->prepare($sql);
		$pdostm->execute();
		$count = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $count;
	}

	public function getAdmin($db){
		$sql = "SELECT first_name, last_name, email, role FROM users WHERE role = 1 ";
		$pdostm = $db->prepare($sql);
		$pdostm->execute();
		$count = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $count;
	}

public function numberOfUsers($db){
	$sql = "SELECT email, COUNT(*) FROM users
	WHERE role = 2 AND FROM_UNIXTIME (created_date, '%m') = 03
	GROUP BY email";
	$pdostm = $db->prepare($sql);
	$pdostm->execute();
	$count = $pdostm->fetchAll(PDO::FETCH_OBJ);
	return $count;
}

}

?>