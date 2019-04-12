<?php
class Admin
{
	private $db;

	/* Constructor function for Request
           Parameters: $db the PDO for the database */
	public function __construct($db) {
            $this->db = $db;
        }

 /*Method that gets all active users from users table
		and number of posted recipes from the recipes
		WHERE users.is_deleted: 0 - means the user is not deleted
		AND users.role = 2- means that user is not admin */
	public function getAllUsers(){

		$sql = "SELECT users.id, first_name, last_name, email, last_login, users.is_deleted, COUNT(recipes.user_id) AS number FROM users
		LEFT JOIN recipes ON users.id = recipes.user_id
		WHERE users.is_deleted = 0 AND users.role = 2
		GROUP BY recipes.user_id";

		$pst = $this->db->prepare($sql);
		$pst->execute();

		$count = $pst->fetchAll(PDO::FETCH_OBJ);
		return $count;
	}


 /*Method that gets a specific user from users table
		 this method is used to get details of that user*/
	public function getUser($id) {
    $sql = 'SELECT * FROM users WHERE id = :id';

    $pst = $this->db->prepare($sql);
    $pst->bindParam(':id', $id);
    $pst->execute();

    $user = $pst->fetch();
    return $user;
	}


	/*Method that delets a specific user from users table
	by setting is_deleted value to 1-means deleted*/
	public function deleteUser($id){
		$sql = "UPDATE users SET is_deleted = 1 WHERE id = :id";

		$pst = $this->db->prepare($sql);
		$pst->bindParam(':id',$id);

		$count = $pst->execute();
		return $count;
	}



	/*Method that gets admin details from users table,
	role = 1 - means admin*/
	public function getAdmin(){
		$sql = "SELECT first_name, last_name, email, role FROM users WHERE role = 1 ";

		$pst = $this->db->prepare($sql);
		$pst->execute();

		$count = $pst->fetchAll(PDO::FETCH_OBJ);
		return $count;
	}



	/*Method that gets all posted recipes from recipe table,
	and names of authors from users table,
	users.role = 2 -means not admin*/
	public function getAllPostedRecipes(){
		$sql = "SELECT recipes.name, description, recipes.created_date, first_name, last_name FROM recipes
		JOIN users ON  recipes.user_id = users.id
		WHERE users.role = 2";


		$pst = $this->db->prepare($sql);
		$pst->execute();

		$count = $pst->fetchAll(PDO::FETCH_OBJ);
		return $count;
	}



	public function numberOfCategories(){
		$sql = "SELECT categories.name, COUNT(recipes.category) AS number FROM categories
		JOIN recipes ON categories.id = recipes.category
		WHERE recipes.is_deleted = 0
		GROUP BY name";

		$pst = $this->db->prepare($sql);
		$pst->execute();
		$categories = $pst->fetchAll(PDO::FETCH_OBJ);
		return $categories;
		}
}
//project email: beyondtheplatephp@gmail.com
//password: humber2019
?>