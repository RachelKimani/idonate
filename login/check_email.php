<?php
include '../dashboard/db/db.php';
//include '../dashboard/functions/auth.php';
$indb = array();
$statement = $connect->prepare("select email from tbl_users");
$statement->execute();
$result = $statement->fetchAll();
if($statement->execute(
)){
  $count = $statement->rowCount();
  if($count > 0)
  {
    $result = $statement->fetchAll();
    if (!$result) {
      echo 'false';
    } else {
      foreach($result as $row)
      {
        $indb[]=$row['email'];
      }
    }
  }
}

$statement1 = $connect->prepare("select username from tbl_users");
$statement1->execute();
$result1 = $statement1->fetchAll();
if($statement1->execute(
)){
  $count1 = $statement1->rowCount();
  if($count1 > 0)
  {
    $result1 = $statement1->fetchAll();
    if (!$result1) {
      echo 'false';
    } else {
      foreach($result1 as $row1)
      {
        $indb[]=$row1['username'];
      }
    }
  }
}
   $requestedEmail  = $_REQUEST['email'];
   if( in_array($requestedEmail, $indb) ){
       echo 'true';
   }
   else{
       echo 'false';
   }
   ?>
