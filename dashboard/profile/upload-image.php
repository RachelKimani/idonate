<?php
if(!isset($_SESSION)) {session_start();}
include '../db/db.php';
include '../functions/profile.php';
if ( isset($_FILES["file"]["type"]) )
{
  $max_size = 1500 * 1024; // 500 KB
  $destination_directory = "assets/upload/";
  $validextensions = array("jpeg", "jpg", "png");
  $userID=$_POST['uid'];
  $temporary = explode(".", $_FILES["file"]["name"]);
  $file_extension = strtolower(end($temporary));

  // We need to check for image format and size again, because client-side code can be altered
  if ( (($_FILES["file"]["type"] == "image/png") ||
        ($_FILES["file"]["type"] == "image/jpg") ||
        ($_FILES["file"]["type"] == "image/jpeg") ||
        ($_FILES["file"]["type"] == "image/gif") ||
        ($_FILES["file"]["type"] == "image/webp") ||
        ($_FILES["file"]["type"] == "image/tiff") ||
        ($_FILES["file"]["type"] == "image/apng") ||
        ($_FILES["file"]["type"] == "image/avif") ||
        ($_FILES["file"]["type"] == "image/svg+xml")
       ) && in_array($file_extension, $validextensions))
  {
    if ( $_FILES["file"]["size"] < ($max_size) )
    {
      if ( $_FILES["file"]["error"] > 0 )
      {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Error: <strong>" . $_FILES["file"]["error"] . "</strong></div>";
      }
      else
      {
        if ( file_exists($destination_directory . $_FILES["file"]["name"]) )
        {
          echo "<div class=\"alert alert-danger\" role=\"alert\">Error: File <strong>" . $_FILES["file"]["name"] . "</strong> already exists.</div>";
        }
        else
        {
          $sourcePath = $_FILES["file"]["tmp_name"];
          $targetPath = $destination_directory . time()."".$_FILES["file"]["name"];

          if(updatePic($userID,$targetPath,$connect) == 'true'){
            echo updatePic($userID,$targetPath,$connect);
            move_uploaded_file($sourcePath, $targetPath);
            $_SESSION['img'] = '/idonate/dashboard/profile/'.$targetPath;
            echo "<div class=\"alert alert-success\" role=\"alert\">";
            echo "<p>Profile picture successfully changed</p>";
            echo "<p>File Name: <a href=\"". $targetPath . "\"><strong>" . $targetPath . "</strong></a></p>";
            //echo "<p>Type: <strong>" . $_FILES["file"]["type"] . "</strong></p>";
            //echo "<p>Size: <strong>" . round($_FILES["file"]["size"]/1024, 2) . " kB</strong></p>";
            //echo "<p>Temp file: <strong>" . $_FILES["file"]["tmp_name"] . "</strong></p>";
            echo "</div>";
          } else {
            //unlink($targetPath);
            echo "Failed to save in db";
          }

        }
      }
    }
    else
    {
      echo "<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is " . round($_FILES["file"]["size"]/1024, 2) . " KB, maximum size allowed is " . round($max_size/1024, 2) . " KB</div>";
    }
  }
  else
  {
    echo "<div class=\"alert alert-danger\" role=\"alert\">Invalid image format.".$file_extension."</div>";
  }
}
//general info
if(isset($_POST['sinfo'])){
  updateInfo($_POST['uid'],$_POST['phone'],$_POST['dob'],$_POST['address'],$connect);
}
//password
if(isset($_POST['npwd'])){
  updatePwd($_POST['pwd'],$_POST['uid'],$connect);
}
//medical
if(isset($_POST['bgrp'])){
  updateMedic($_POST['uid'],$_POST['bloodtype'],$_POST['weight'],$_POST['height'],$connect);
}

?>
