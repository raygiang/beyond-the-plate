<?php
class Timer{

	private $recipeId;
	private $db;
	/* Constructor function for Request
           Parameters: $db the PDO for the database
           						 $id the id of recipe */
	public function __construct($db, $id)
	{
	  $this->setRecipeId($id);
	  $this->db = $db;
	}

	public function setRecipeId($id)
	{
	  $this->recipeId = $id;
	}

	public function getRecipeId()
	{
	  return $this->recipeId;
	}


 	/*Method that gets time for preparation a selected recipe
 		from instrucions table
 		WHERE is_deleted: 0 - means the instruction is not deleted */
	public function getTime() {
		$recipe = $this->getRecipeId();

		$sql = "SELECT details, step, instructions.is_deleted, prep_time, name, description
		FROM instructions
		JOIN recipes
		ON instructions.recipe_id = recipes.id
		WHERE instructions.recipe_id = :recipe_id
		AND instructions.is_deleted = 0";

		$pst = $this->db->prepare($sql);

		$pst->execute(array(
	    ':recipe_id' => $recipe
		));

		$time = $pst->fetchAll();
		return $time;
	}
}
?>