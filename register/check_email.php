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
      echo 'true';
    } else {
      foreach($result as $row)
      {
        $indb[]=$row['email'];
      }
    }
  }
}
   $requestedEmail  = $_REQUEST['email'];
   if( in_array($requestedEmail, $indb) ){
       echo 'false';
   }
   else{
       echo 'true';
   }
   ?>
