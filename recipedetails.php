<?php
  require_once 'vendor/autoload.php';
  $page = new Homepage('Recipes');
  $db = Database::getDb();  
  session_start();

  if(isset($_POST["comment"]))
  {
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $recipeid = $_POST["recipeid"];
    $userid = $_SESSION["userid"];
    
    $c = new Comment();
    $count=$c->addComments($recipeid,$userid,$comment,$db);

    $r = new Rating();
    $count=$r->addRatings($recipeid,$userid,$rating,$db);
  }


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
    error_reporting(E_ALL ^ E_NOTICE);  
    echo $page->generateHeader();
    require_once("views/recipedetails.php");
    echo $page->generateFooter();
  ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="vendor/nicolasbize/magicsuggest/magicsuggest.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(".secondaryImage").mouseover(function(){
        $("#primaryImage").attr("src",$(this).attr("src"));
      });
    });
  </script>>
</body>
</html>