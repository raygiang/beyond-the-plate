<?php
  require_once('lib/classes/Page.php');
  require_once('lib/classes/Homepage.php');

  $page = new Homepage('Home Page');
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">

</head>
<body>
  <?php
    echo $page->generateHeader();
    require_once("views/registeruser.php");
    echo $page->generateFooter();
  ?>
</body>
</html>