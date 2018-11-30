<?php
require("connection.php");
session_start();


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
         if($sql =$con->prepare("UPDATE ProfilePic set imageLink=?,contentType=? where username=?")){
         $null=NULL;
         $sql->bind_param('bss',$null,$ext,$user );
         $sql->send_long_data(0,$imagedata);
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
