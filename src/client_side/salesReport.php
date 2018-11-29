<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/general.css" />
<?php

require("../server_side/connection.php");
require("../server_side/header.php");
if(isset($_SESSION['adminUsername'])){
$results=mysqli_query($con,"SELECT timesOrdered,upc from Product");
$dataPoints =array();
$count =10;
while($row=$results->fetch_assoc()){

$dataPoints[]= array("x"=>$count, "y"=>$row['timesOrdered'], "indexLabel"=>"'".$row['upc']."'");
$count =$count +10;
}
}else {
	header("location: ../server_side/processLogin.php");
}

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
