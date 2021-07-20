<?php
  include '../db/db.php';
  include '../functions/auth.php';
  date_default_timezone_set('Africa/Nairobi');
  if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $privateKey = trim($_POST['privateKey']);
    $password = trim($_POST['password']);
    

    login($email,$password,$connect,$key='');
  }
 ?>