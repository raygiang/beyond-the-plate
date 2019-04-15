<?php
  session_start();
  require_once('lib/classes/Recipe.php');
  require_once('lib/classes/database.php');
  $db = Database::getDb();

  var_dump($_POST["instruction_text"]);

  if(isset($_POST['sbtBtn']))
  {
    $recipeName=$_POST["recipeName"];
    $recipeDescription=$_POST["recipeDescription"];
    $recipeCategory=$_POST["recipeCategory"];
    $user_id=$_SESSION["userid"];
    $is_deleted=0;
    $id=time();

    for($i=0;$i<count($_FILES["uploadfile"]["name"]);$i++)
    {
      $uploadfile=$_FILES["uploadfile"]["tmp_name"][$i];
      $folder="recipeimages/";
     
      $tmp = explode('.', $_FILES["uploadfile"]["name"][$i]);
      $ext = end($tmp);

      move_uploaded_file($_FILES["uploadfile"]["tmp_name"][$i], "$folder".$id."_".($i+1).".".$ext);
    }

    $instructions = $_POST["instruction_text"];
    $instruction_times = $_POST["instruction_minutes"];

    $ingredients = $_POST["ingredient_text"];
    $ingredients_qty = $_POST["ingredient_quantity"];
    $ingredients_unit = $_POST["ingredient_unit"];

    $r = new Recipe();
    $count=$r->addRecipe($id,$recipeName,$user_id,$recipeDescription,$recipeCategory,$is_deleted,$db);
    $count=$r->addRecipeInstructions($id,$instructions,$instruction_times,$db);
    $count=$r->addRecipeIngredients($id,$ingredients,$ingredients_qty,$ingredients_unit,$db);

  
    header("location:userdash.php");
    
  }
  ?>