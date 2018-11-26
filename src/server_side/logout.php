<?php
session_start();
if(isset($_SESSION['username'])){
  session_destroy();
  header("location: ".$_SERVER['HTTP_REFERER']);
}else{
  header("location: ".$_SERVER['HTTP_REFERER']);
}
 ?>
