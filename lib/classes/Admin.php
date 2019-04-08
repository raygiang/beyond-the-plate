<?php
class Admin

{
	private $id;
	private $email;
	private $firstname;
	private $lastname;
	private $role;
	private $name;




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
public function getAllPostedRecipes($db){
	$sql = "SELECT recipes.name, description, recipes.created_date, first_name, last_name FROM recipes
	JOIN users ON  recipes.user_id = users.id";
	// WHERE FROM_UNIXTIME (created_date, '%m') = 01
	//GROUP BY name
	$pdostm = $db->prepare($sql);
	$pdostm->execute();
	$count = $pdostm->fetchAll(PDO::FETCH_OBJ);
	return $count;
}
public function numberOfCategories($db){
	$sql = "SELECT name, COUNT(*) AS number FROM categories
	GROUP BY name";
	$pst = $db->prepare($sql);
	$pst->execute();
	$categories = $pst->fetchAll(PDO::FETCH_OBJ);
	return $categories;
	}
}
//project email: beyondtheplatephp@gmail.com
//password: humber2019
?>