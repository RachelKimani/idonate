<?php
include '../db/db.php';
//include '../dashboard/functions/auth.php';
$indb = array();
$statement = $connect->prepare("select password from tbl_auth where userID = :uid");
$statement->execute(
  array(
  ':uid'       => $_REQUEST['uid']
)
);
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
        $indb[]=$row['password'];
      }
    }
  }
}
   if(password_verify($_REQUEST['currPwd'], $row["password"]))
   {
     echo "true";
   }
   else{
       echo 'false';
   }

   ?>
