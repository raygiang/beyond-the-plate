<?php
require_once '../../vendor/autoload.php';
// require_once('../../lib/classes/Database.php');

	$db = Database::getDb();
	$page = new Requestrecipe('Edit Request');

  $title = $content = "";

	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$db = Database::getDb();

		$sql = "SELECT * FROM recipe_requests WHERE id = :id";
		$pst = $db->prepare($sql);
		$pst->bindParam(':id', $id);
		$pst->execute();
		$request = $pst->fetch(PDO::FETCH_OBJ);
		$title = $request->title;
		$content = $request->description;
		// var_dump($title);

	}
// echo 'hi'.$username;
	// var_dump($username);

	if(isset($_POST['edit'])){
		$id = $_POST['rid'];
		$title = $_POST['requestTitle'];
		$content = $_POST['requestContent'];


		$db = Database::getDb();
		$page = new Requestrecipe('Edit Request');
		$updateReq = $r->editRequest($id, $title, $content, $db);
		if($updateReq){
       header('Location:  ../../request.php');
    } else {
        echo "problem";
    }
}
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/cookbook.css">
</head>
<body>
<main id="main">
	<div class="col-12 col-md-4">
	  <form action="#" method="POST" name="recipeRequest">
	  	<input type="hidden" name="rid" value="<?= $id; ?>" />
	    <div class="form-group">
	      <label class="col-form-label" for="request-title">Meal title:</label>
	      <input type="text" class="form-control" name="requestTitle" id="request-title" value="<?php echo $title; ?>">
	    </div>
	    <div class="form-group">
	      <label for="request-content">Meal description:</label>
	      <textarea class="form-control" name="requestContent" id="request-content" rows="max"><?php echo $content ?></textarea>
	    </div>
	    <button type="submit" class="btn btn-secondary" name="edit" id="btn">Edit Request</button>
	  </form>
	</div>
</main>
</body>
</html>