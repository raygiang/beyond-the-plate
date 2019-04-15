<?php
  session_start();
  $_SESSION['user_id'] = 1;

  require_once 'vendor/autoload.php';
  require_once 'config.php';

  $shopList = new ShoppingList(Database::getDb(), 'Shopping List');

  if(isset($_POST['recipe_list'])) {
      $recipes = explode('|', $_POST['recipe_list']);
      array_shift($recipes);

      $sList = $shopList->getShoppingList($recipes);
  }
?>

<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $shopList->getTitle(); ?></title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cookbook.css">
</head>
<body>
  <main id="main">
    <div class="page-wrapper">
      <h2>Shopping List</h2>

      <input type="text" id="recipe-search">
    
      <div id="selected-items">
        <h4>Currently Selected:</h4>
      </div>

      <div id="recipe-suggestions"></div>

      <form action="" method="post">
        <input id="recipe-list" type="hidden" name="recipe_list">
        <input type="submit" name="genShopList" value="Create Shopping List">
      </form>

      <div id="shopping-list">
        <h3>Your Shopping List</h3>
        <?php
          if(isset($sList)) {
            foreach($sList as $item) {
              echo "<div>$item->qty $item->unit of $item->name</div>";
            }
          }
        ?>
      </div>
    </div>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?= SCRIPTS ?>shoppinglist.js"></script>
</body>
</html>