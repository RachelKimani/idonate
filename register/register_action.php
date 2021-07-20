<?php
  include '../db/db.php';
  include '../functions/auth.php';
  date_default_timezone_set('Africa/Nairobi');
  if(isset($_POST['register'])){
    $userID = trim($_POST['userID']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = trim($_POST['dob']);
    $privateKey = trim($_POST['privateKey']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $t=time();
    $dateCreated =date("Y-m-d h:i:s",$t);
    register($userID,$firstName,$lastName,$username,$gender,$address,$email,$phone,$dob,$privateKey,$password,$dateCreated,$connect);
  }
 ?>