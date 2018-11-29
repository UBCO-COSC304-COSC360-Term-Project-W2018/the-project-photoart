<?php
require("connection.php");
session_start();
$uName = $_SESSION['username'];

$validExt = array('gif','png','jpg');
$max_file_size= 1000000;

if(isset($_SESSION['username'])&&isset($_FILES['userImage'])){
  $user=$_SESSION['username'];
   $size = $_FILES['userImage']['size'];
        $check=getimagesize($_FILES['userImage']['tmp_name']);
        $imagedata = file_get_contents($_FILES['userImage']['tmp_name']);

        //checking that it is a valid image
        //checking file size
        if($check !== false && $size<$max_file_size){
          //getting submitted file extension
          $ext = pathinfo($_FILES['userImage']['name'],PATHINFO_EXTENSION);
          //checking if it is valid
          if(in_array($ext,$validExt)){
            //moving file to folder

         //inserting image
         if($sql =$con->prepare("INSERT INTO ProfilePic (username,imageLink,contentType)VALUES(?,?,?)")){
         $null=NULL;
         $sql->bind_param('ssb',$user,$ext,$null );
         $sql->send_long_data(2,$imagedata);
         $sql->execute();
         echo "<script type ='text/javascript'>
          alert('photo added!')
          location='../client_side/PhotoArtEditProfile.php'
         </script>";
       }
     }
   }
 }else{
   echo "bad";

 }
  ?>
