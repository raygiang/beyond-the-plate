<?php
class Timer{

private $recipeId;

	public function __construct($recipeId)
	    {
	        $this->setRecipeId($recipeId);
	    }
	public function setRecipeId($id) {
	        $this->recipeId = $id;
	  	}

	public function getRecipeId() {
	      return $this->recipeId;
	  }


	public function getTime($db){
	$sql = "SELECT * FROM instructions
	WHERE recipe_id = ?
	AND is_deleted = 0";

	$pst = $db->prepare($sql);

	$pst->execute(['recipe_id']);
	$time = $pst->fetchAll(PDO::FETCH_OBJ);
	return $time;
	}
}