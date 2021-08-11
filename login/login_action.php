<?php
  include '../dashboard/db/db.php';
  include '../dashboard/functions/auth.php';
  include '../dashboard/functions/sendemail.php';
  date_default_timezone_set('Africa/Nairobi');
  if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    login($email,$password,$connect);
  }else if(isset($_GET["g_l"])){
    $email = mysqli_real_escape_string($mysqli, $_GET["g_l"]);
    $img = $_GET['g_img'];
    $password = md5('g_l');
    login($email,$password,$connect,$img);
  }
  if(isset($_POST['reset'])){
    resetPassword(trim($_POST['email']),$connect);
  }
 ?>
