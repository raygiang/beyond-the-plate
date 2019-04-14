 <?php
    require_once '../../vendor/autoload.php';
    require_once '../../config.php';
    $request = new Requestrecipe(Database::getDb(), 'Edit a Request');

    // Retrieve the information about the request that needs to be updated
    if(isset($_POST['id'])) {
        $requestEdit = $request->getRequest($_POST['id']);
    }


?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/cookbook.css">
</head>
<body>
<main id="main">
	<h2>Edit Request</h2>
	<div class="col-12 col-md-4">
	  <form  action="../../request.php" method="POST">
	  	<input type="hidden" name="id" value="<?php $requestEdit['id']; ?>">
	    <div class="form-group">
	      <label class="col-form-label" for="request-title">Meal title:</label>
	      <input type="text" class="form-control" name="title" id="request-title" value="<?php echo $requestEdit['title']; ?>">
	    </div>
	    <div class="form-group">
	      <label for="request-content">Meal description:</label>
	      <textarea class="form-control" name="description" id="request-content" rows="max"><?php echo $requestEdit['description']; ?></textarea>
	    </div>
	    <button type="submit" class="btn btn-secondary" name="edit" id="btn">Edit Request</button>
	  </form>
	</div>
</main>
</body>
</html>