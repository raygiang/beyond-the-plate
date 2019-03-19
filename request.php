<?php
 require_once('lib/classes/Page.php');
 require_once('lib/classes/Requestrecipe.php');
 require_once('lib/classes/Database.php');

 $dbconnection = Database::getDb();
 $page = new Requestrecipe('Recipe Request');
 $listrequests = $page->getAllRequests(Database::getDb());


?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>

  <?php
  var_dump($page->getAllRequests(Database::getDb()));

    echo $page->generateHeader();
    echo $page->displayRequestRecipe();
    echo $page->generateFooter();
  ?>
</body>
</html>