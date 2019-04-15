<?php
	require_once '../../lib/classes/Database.php';
	require_once '../../lib/classes/Admin.php';


	$admin = new Admin(Database::getDb());
	$recipes = $admin->getAllPostedRecipes();
	$categories = $admin->numberOfCategories();

	$string1 = array();
	$data1 = array();

	$string2 = array();
	$data2 = array();

	foreach($recipes as $recipe){
	$data1['UserName'] = $recipe->first_name." ".$recipe->last_name;
	$data1['RecipeName'] = $recipe->name;
	$data1['RecipeDescription'] = $recipe->description;
	$data1['PostedDate'] =  date('m/d/Y H:i:s', $recipe->created_date);

	$string1[]=$data1;
	}

	foreach($categories as $category){
	$data2['CategoryName'] = $category->name;
	$data2['CategoryNumber'] = $category->number;

	$string2[]=$data2;
	}

	$string1 = json_encode($string1);
	$string2 = json_encode($string2);
	header('Content-Type: application/json');
	echo $string1."|". $string2;

?>