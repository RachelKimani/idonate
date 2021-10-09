<?php
include '../db/db.php';
include '../functions/appointments.php';
  if(isset($_POST['consent2'])){
    $donorcheck = 0;
    $donorprotect = 0;
    $donorreject = 0;
    $extralab =0;

    for ($i=1; $i <= 5 ; $i++) {
      foreach ($_POST as $key => $row) {
        if($key=='qa'.$i){
          if($key=='qa1'|| $key=='qa2'){
            if($row=='no'){
              $donorcheck+=1;
            }
          } else {
            if($row=='yes'){
              $donorcheck+=1;
            }
          }
        }
      }
    }

    for ($i=6; $i <= 12 ; $i++) {
      foreach ($_POST as $key => $row) {
        if($key=='qa'.$i){
          if($row=='yes'){
            $donorreject+=1;
          }
        }
      }
    }


    for ($i=1; $i <= 12 ; $i++) {
      foreach ($_POST as $key => $row) {
        if($key=='qb'.$i){
          if($key=='qb1'|| $key=='qb2'|| $key=='qb6'){
            if($row=='yes'){
              $donorreject+=1;
            }
          }else {
            if($row=='yes'){
              $extralab+=1;
            }
          }
        }
      }
    }
    $comment = "";
    $status = "Rejected";
    if($donorreject>0){
      $comment.= "Reject donor";
      if($extralab>0){
        $comment.= " with label High risk donor";
      }
    }else {
      $comment.="Accept donor";
      if($donorcheck>0){
        $comment.= " with label check donor on arrival";
      }
      if($extralab>0){
        $comment.= " , High risk donor";
      }
      $status = "Accepted";
    }
    if(!isset($_SESSION)) {session_start();}
    $results=serialize($_POST);
    $userID = $_SESSION['userID'];
    addTest(uniqid(),$userID,$results,$status,$comment,$connect);
  }

 ?>
