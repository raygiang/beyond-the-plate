<?php
require_once '../../lib/classes/Database.php';
require_once '../../lib/classes/Admin.php';

$db = Database::getDb();
$admin = new Admin();



$recipes = $admin->getAllPostedRecipes(Database::getDb());

$data = array();
$string = array();

foreach($recipes as $recipe){
$data['UserName'] = $recipe->first_name." ".$recipe->last_name;
$data['RecipeName'] = $recipe->name;
$data['RecipeDescription'] = $recipe->description;
$data['PostedDate'] = $recipe->created_date;
$string[]=$data;
}
$string = json_encode($string);
header('Content-Type: application/json');
echo $string;



$categories = $admin->numberOfCategories(Database::getDb());

$data = array();
$string = array();

foreach($categories as $category){
$data['CategoryName'] = $category->name;
$data['CategoryNumber'] = $category->number;
$string[]=$data;
}

$string = json_encode($string);
header('Content-Type: application/json');
echo $string;





?>
