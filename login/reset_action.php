<?php
include '../dashboard/db/db.php';
if (isset($_POST['reset'])) {
  $email = $_POST['email'];
  $newurl = $_POST['url'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $statement1 = $connect->prepare("
  UPDATE tbl_auth AS u
  INNER JOIN tbl_users AS t ON u.userID = t.userID
  SET u.password = :password
  WHERE  t.email = :email
  ");
  if($statement1->execute(
    array(
      ':email'		=>	$email,
      ':password'		=>	$password
    )
  )){
    if(unlink($newurl)){
      header("location:reset_success.php");
    }else {
      header("location:reset_failed.php");
    }
    //echo "Email Activated";
  } else {
    header("location:reset_failed.php");
  }

}
 ?>
