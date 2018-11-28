<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/general.css" />
<?php
require("../server_side/connection.php");
require("../server_side/header.php");
$results=mysqli_query($con,"SELECT timesOrdered,upc from Product");
$dataPoints =array();
$count =10;
while($row=$results->fetch_assoc()){

$dataPoints[]= array("x"=>$count, "y"=>$row['timesOrdered'], "indexLabel"=>"'".$row['upc']."'");
$count =$count +10;
}

// $dataPoints = array(
// 	array("x"=> 10, "y"=> 41, "indexLabel"=> "bob"),
// 	array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
// 	array("x"=> 30, "y"=> 50),
// 	array("x"=> 40, "y"=> 45),
// 	array("x"=> 50, "y"=> 52),
// 	array("x"=> 60, "y"=> 68),
// 	array("x"=> 70, "y"=> 38),
// 	array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
// 	array("x"=> 90, "y"=> 52),
// 	array("x"=> 100, "y"=> 60),
// 	array("x"=> 110, "y"=> 36),
// 	array("x"=> 120, "y"=> 49),
// 	array("x"=> 180, "y"=> 41)
// );

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Total sales"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 100%; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
