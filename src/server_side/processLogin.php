<?php
session_start();
if(isset($_SESSION['username'])){
  header("location: ../client_side/PhotoArtMain.php");

}else{
  header("location: ../client_side/PhotoArtLogin.php");
}
 ?>
