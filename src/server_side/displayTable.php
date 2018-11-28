<?php
session_start();
include('connection.php');

//check if user account exists
$table = $_POST["table"];
$sql = "Select * From ".$table;

$results = mysqli_query($con, $sql);
//foreach result(row) in results
if (isset($results)){
echo($table);
while ($row = mysqli_fetch_row($results)){
  echo("<br>--data<br>");
  for ($i = 0; $i < count($row); $i++){
    echo("----".$row[$i]."<br>");
  }
}
}else{
  echo("Table does not exist");
}
$con->close();
 ?>
