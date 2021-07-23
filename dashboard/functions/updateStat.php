<?php
if(!isset($_SESSION)) {session_start();}
  if(isset($_SESSION['log']))
  {
    if($_SESSION['log']=='unlocked'){
      echo '1';
    } else {
      echo '2';
    }
  } else {
    echo '3';
  }

 ?>
