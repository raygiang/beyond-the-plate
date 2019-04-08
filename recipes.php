<?php
  require_once 'vendor/autoload.php';

  $page = new Homepage('Recipes');
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <?php
    error_reporting(E_ALL ^ E_NOTICE);  
    echo $page->generateHeader();
    echo $recipe->displayAllRecipes();
    echo $page->generateFooter();
  ?>
</body>
</html>