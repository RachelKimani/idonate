<?php
include '../db/db.php';
include '../dashboard/functions/auth.php';
$indb = array();
$statement = $connect->prepare("select username from tbl_users where userID != :uid");
//$statement->execute();
//$result = $statement->fetchAll();
if($statement->execute(
  array(
    ':uid' => $_REQUEST['uid'];
  )
)){
  $count = $statement->rowCount();
  if($count > 0)
  {
    $result = $statement->fetchAll();
    if (!$result) {
      echo 'true';
    } else {
      foreach($result as $row)
      {
        $indb[]=$row['username'];
      }
    }
  }
}
   $requestedEmail  = $_REQUEST['username'];
   if( in_array($requestedEmail, $indb) ){
       echo 'false';
   }
   else{
       echo 'true';
   }
   ?>
