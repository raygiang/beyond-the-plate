
window.onload = function(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function()
  {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
    {
        var jsonArray = xmlhttp.responseText.split("|");
        var jsonArray1 = JSON.parse(jsonArray[0]); //xmlhttp.responseText.split("|")[0]
        var jsonArray2 = JSON.parse(jsonArray[1]);

        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawTable()
        {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'User Name');
          data.addColumn('string', 'Recipe Name');
          data.addColumn('string', 'Recipe Description');
          data.addColumn('string', 'Posted Date');

          console.log(data);
          for(var i = 0; i < jsonArray1.length; i++)
          {
            data.addRows([[jsonArray1[i]['UserName'], jsonArray1[i]['RecipeName'],jsonArray1[i]['RecipeDescription'],jsonArray1[i]['PostedDate']]]);
          }
          var table = new google.visualization.Table(document.getElementById('table'));
          table.draw(data, {showRowNumber: true, width: '100%', height: '30%'});
        }

        function drawChart() {
          var data2 = new google.visualization.DataTable();
          data2.addColumn('string', 'Category Name');
          data2.addColumn('number', 'Number');
          console.log(data2);
        for(var i = 0; i < jsonArray2.length; i++)
          {
            data2.addRows([[jsonArray2[i]['CategoryName'], parseInt(jsonArray2[i]['CategoryNumber'])]]);
          }

        var options = {
          title: 'Food categories',
          pieHole: 0.4,
          pieSliceText: 'value-and-percentage',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        chart.draw(data2, options);


        var barchart_options = {title:'Food categories',
                       legend: 'none'};
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data2, barchart_options);
      }

    }
  }
  xmlhttp.open("GET","../project-cookbook/admin/charts/chart-data.php",true);
  xmlhttp.send();

 $('#recipes').click(function(){
     $('#table').toggle();

   });
$('#listrequest').click(function(){
     $('#request').toggle();

   });


};