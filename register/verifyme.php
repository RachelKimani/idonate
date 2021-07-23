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
      $statement1 = $connect->prepare("
      UPDATE tbl_auth AS u
      INNER JOIN tbl_users AS t ON u.userID = t.userID
      SET u.status = 'active'
      WHERE  t.email = :email
      ");
      if($statement1->execute(
        array(
          ':email'		=>	$email
        )
      )){
        if(unlink($newurl)){
          ob_start();                      // start capturing output
          include('verify_success.php');   // execute the file
          $body = ob_get_contents();    // get the contents from the buffer
          ob_end_clean();
          //header("location:verify_success.php");
        }else {
          ob_start();                      // start capturing output
          include('verify_failed.php');   // execute the file
          $body = ob_get_contents();    // get the contents from the buffer
          ob_end_clean();
          //header("location:verify_failed.php");
        }
        //echo "Email Activated";
      } else {
        //echo "Activation failed";
      }
    } else {
      ob_start();                      // start capturing output
      include('verify_failed.php');   // execute the file
      $body = ob_get_contents();    // get the contents from the buffer
      ob_end_clean();
      //echo "invalid url";
    }
  } else {
    ob_start();                      // start capturing output
    include('verify_failed.php');   // execute the file
    $body = ob_get_contents();    // get the contents from the buffer
    ob_end_clean();
    //header("location:verify_failed.php");
  }

} else {
  ob_start();                      // start capturing output
  include('verify_invalid.php');   // execute the file
  $body = ob_get_contents();    // get the contents from the buffer
  ob_end_clean();
  //echo "Invalid gateway";
}
echo $body;
 ?>
