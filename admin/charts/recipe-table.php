<?php
// require_once '../../vendor/autoload.php';
// require_once '../../config.php';
//require_once '../../lib/classes/Admin.php';

$db = Database::getDb();
$admin = new Admin();
$recipes = $admin->getAllPostedRecipes(Database::getDb());

    //var_dump($categories);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Recipe Name');
        data.addColumn('string', 'Recipe Description');
        data.addColumn('string', 'Posted Date');
        data.addColumn('string', 'User Name');
        //data.addColumn('string', 'Action');
        data.addRows([
          <?php foreach($recipes as $recipe): ?>
          <?php echo "['".$recipe->name."', '".$recipe->description."','". date('m/d/Y H:i:s', $recipe->created_date)."', '".$recipe->first_name . " " . $recipe->last_name. "'],"; ?>
          <?php endforeach; ?>
        ]);

        // var table = new google.visualization.Table(document.getElementById('table'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '30%'});
      }
    </script>
  </head>
  <!-- <body>
    <div id="table_div"></div>
  </body> -->
</html>


