
function getRecipes()
{
	var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
				var result = JSON.parse(xmlhttp.responseText);
				google.charts.load('current', {'packages':['table']});
				google.charts.setOnLoadCallback(drawTable);

				function drawTable()
				{
					var data = new google.visualization.DataTable();
          data.addColumn('string', 'User Name');
        	data.addColumn('string', 'Recipe Name');
        	data.addColumn('string', 'Recipe Description');
        	data.addColumn('string', 'Posted Date');


        	for(var i=0; i<result.length; i++)
        	{
        		data.addRows([[result[i]['UserName'], result[i]['RecipeName'],result[i]['RecipeDescription'],result[i]['PostedDate']]]);
        	}
        	var table = new google.visualization.Table(document.getElementById('chart'));
        	table.draw(data, {showRowNumber: true, width: '100%', height: '30%'});
				}
    }
  }
  xmlhttp.open("GET","../project-cookbook/admin/charts/recipes.php",true);
  xmlhttp.send();
}




