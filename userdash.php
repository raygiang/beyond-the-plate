<?php
  require_once('lib/classes/Page.php');
  require_once('lib/classes/Homepage.php');
  require_once('lib/classes/Recipe.php');
  require_once('lib/classes/database.php');

  $db = Database::getDb();
  session_start();
  $page = new Homepage('Dashboard@'.$_SESSION["user"]);
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">


</head>
<body>
  <?php
    error_reporting(E_ALL ^ E_NOTICE);
    echo $page->generateHeader();
    require_once("views/userdash.php");
    echo $page->generateFooter();
  ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="vendor/nicolasbize/magicsuggest/magicsuggest.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>