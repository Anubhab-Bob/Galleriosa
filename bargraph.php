<html>
	<h1 align="center"><font size="26" face="Brush Script MT"><big>GALLERIOSA</big></font></h1>
    <hr><hr><br><br><br>
	<style>
		body 
		{
	  		background-image: url('bgimage.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;
	  		background-size: cover;
		}
	</style>
<?php

$conn1 = new mysqli('localhost','root','','gallery');
if($conn1->connect_error)
	die("Connection Failed : ".$conn1->connect_error);
else 
{
	$query = "SELECT
    SUM(o.amount) as y,
    a.style as label
FROM
    orders o,customer c,art a
WHERE
    o.cid=c.cid and o.artid=a.artid and o.date between '2019-01-01' and '2019-12-31'	
GROUP BY
    a.style";
	$result = $conn1->query($query);
	$dataPoints = array();
	while ($row = mysqli_fetch_assoc($result))
	{
		array_push($dataPoints, $row);
	}
	$conn1->close();
}
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() 
{ 
var chart = new CanvasJS.Chart("chartContainer", 
{
	animationEnabled: true,
	title:
	{
		text: "Style-wise Report of Sale in Given Period"
	},
	axisY: 
	{
		title: "Revenue (in Rs)",
		prefix: "Rs",
	},
	data: [{
		type: "bar",
		yValueFormatString: "Rs #,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>