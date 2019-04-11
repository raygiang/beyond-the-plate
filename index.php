<?php
  require_once 'vendor/autoload.php';

  $page = new Homepage('Home Page');
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $page->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
</head>
<body>
  <?php
    error_reporting(E_ALL ^ E_NOTICE);  
    echo $page->generateHeader();
    echo $page->displayHomepageContent();
    echo $page->generateFooter();
  ?>
</body>
</html>