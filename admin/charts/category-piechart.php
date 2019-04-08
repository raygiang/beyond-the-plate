<?php
// require_once '../../vendor/autoload.php';
// require_once '../../config.php';
// require_once '../../lib/classes/Admin.php';

$db = Database::getDb();
$admin = new Admin();
$categories = $admin->numberOfCategories(Database::getDb());

		//var_dump($categories);

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Category', 'Number'],
          <?php foreach($categories as $category): ?>
          <?php echo "['".$category->name ."', ".$category->number."],"; ?>
        	<?php endforeach; ?>
        ]);

        var options = {
          title: 'The most popular food category',
          pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <!-- <body>
    <div id="chart" style="width: 900px; height: 500px;"></div>
  </body> -->
</html>