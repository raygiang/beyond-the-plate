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
</head>
<body>
  <?php
    echo $page->generateHeader();
    echo $page->displayHomepageContent();
    echo $page->generateFooter();
  ?>
</body>
</html>