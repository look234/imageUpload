<?php
   //Original from w3schools.com, http://www.w3schools.com/php/php_file_upload.asp
   //modified by Vincent Leith.

   $target_dir = "uploads/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
   $fileTypes = [ 0 => "jpg", 1 => "JPG", 2 => "jpeg", 3 => "JPEG", 4 => "png", 5 => "PNG", 6 => "gif", 7 => "GIF" ]; 

   if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
         $uploadOk = 1;
      }else{
         $message = 0;
         $uploadOk = 0;
      }
   }

   if(file_exists($target_file)){
       $message = 1;
       $uploadOk = 0;
   }

   if($_FILES["fileToUpload"]["size"] > 5000000){
       $message = 2;
       $uploadOk = 0;
   }

   if( !in_array($imageFileType, $fileTypes) ){
      $message = 3;
      $uploadOk = 0;
   }

   if($uploadOk == 0){
      http_redirect("index.php", array("message" => $message));
   }else{
      if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
         $message = 6;
         http_redirect("gallery.php", array("message" => $message));
      }else{
         $message = 5;
         http_redirect("index.php", array("message" => $message));
      }
   }
?>