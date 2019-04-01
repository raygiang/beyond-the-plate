<?php
// require_once '../../vendor/autoload.php';
// require_once '../../config.php';
$db = Database::getDb();

$sql = "SELECT name, COUNT(*) AS number FROM categories
GROUP BY name";
		$pst = $db->prepare($sql);
		$pst->execute();
		$categories = $pst->fetchAll(PDO::FETCH_OBJ);

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
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
   <!--  <div id="donutchart" style="width: 900px; height: 500px;"></div> -->
  </body>
</html>