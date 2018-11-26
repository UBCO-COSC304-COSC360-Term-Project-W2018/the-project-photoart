<?php
$dir ='src';
$folders =scandir($dir);
//print_r($folders);

foreach ($folders as $folder) {

      echo "<a href=".$folder.">".$folder."</a><br>";

}
?>
