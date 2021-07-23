<?php
if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['log']))
{
  if($_SESSION['log']=='unlocked'){
    //echo '<script>window.top.location.href = "/idonate/dashboard";</script>';
  } else {
    echo '<script>window.top.location.href = "/idonate/login/lock.php";</script>';
    die();
  }
} else {
  echo '<script>window.top.location.href = "/idonate/login?se";</script>';
  die();
}
 ?>
