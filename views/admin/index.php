<?php require 'views/layouts/admin-menu.php'; ?>

<h2>Dashboard Page</h2>
<h3>Chart Stok Barang</h3>
<div id="piechart"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// var r = $.get("<?=URL;?>/obat/get-stok",function(response){
// 	return response;
// },"json");

// console.log(r);
// Draw the chart and set the chart values
function drawChart() {
	var jsonData = $.ajax({
          url: "<?=URL;?>/obat/get-stok",
          async: false
          }).responseText;
  	var data = new google.visualization.DataTable(jsonData);

	// Optional; add a title and set the width and height of the chart
	var options = {'title':'Stok Barang', 'height':500};

	// Display the chart inside the <div> element with id="piechart"
	var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
	chart.draw(data, options);
}
</script>
<?php require 'views/layouts/admin-menu-bottom.php'; ?>