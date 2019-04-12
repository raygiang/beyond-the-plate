<?php
class Timer{

	private $recipeId;

	public function __construct($db, $id)
	{
	  $this->setRecipeId($id);
	}

	public function setRecipeId($id)
	{
	  $this->recipeId = $id;
	}

	public function getRecipeId()
	{
	  return $this->recipeId;
	}



	public function getTime($db) {

		$recipe = $this->getRecipeId();

		$sql = "SELECT * FROM instructions
		WHERE recipe_id = :recipe_id
		AND is_deleted = 0";

		$pst = $db->prepare($sql);

		$pst->execute(array(
	    ':recipe_id' => $recipe
		));
		$time = $pst->fetchAll();
		return $time;
	}
}
?>