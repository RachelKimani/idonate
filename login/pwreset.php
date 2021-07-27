<?php
include '../dashboard/db/db.php';
$body ='';
if (isset($_GET['xd'])) {
  $newurl = 'verifier/'.$_GET['xd'].'.json';
  if (file_exists($newurl)) {
    $str = file_get_contents($newurl);
    $json = json_decode($str, true);
    $email = $json['email'] ;
    if($email==$_GET['email']){
      ob_start();                      // start capturing output
      include('reset_form.php');   // execute the file
      $body = ob_get_contents();    // get the contents from the buffer
      ob_end_clean();
    } else {
      ob_start();                      // start capturing output
      include('../register/verify_failed.php');   // execute the file
      $body = ob_get_contents();    // get the contents from the buffer
      ob_end_clean();
      //echo "invalid url";
    }
  } else {
    ob_start();                      // start capturing output
    include('../register/verify_failed.php');   // execute the file
    $body = ob_get_contents();    // get the contents from the buffer
    ob_end_clean();
    //header("location:verify_failed.php");
  }

} else {
  ob_start();                      // start capturing output
  include('../register/verify_invalid.php');   // execute the file
  $body = ob_get_contents();    // get the contents from the buffer
  ob_end_clean();
  //echo "Invalid gateway";
}
echo $body;
 ?>
