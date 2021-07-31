<?php
function updatePic($userID,$targetPath,$connect)
{
  $statement = $connect->prepare("
    update tbl_users set profileUrl = :url where userID = :uid
	");
	if($statement->execute(
		array(
			':uid'       =>  $userID,
      ':url'       =>  $targetPath
		)
	)){
    return 'true';
  } else {
    return 'false';
  }
}
function updateInfo($userID,$phone,$dob,$address,$connect){
  $statement = $connect->prepare("
    update tbl_users set dob = :dob, address = :address, phone=:phone where userID = :uid
	");
	if($statement->execute(
		array(
			':uid'       =>  $userID,
      ':dob'       =>  $dob,
      ':address'       =>  $address,
      ':phone'       =>  $phone
		)
	)){
    echo 'true';
  } else {
    echo 'false';
  }
}
function updatePwd($pwd,$uid,$connect)
{
  $statement = $connect->prepare("
    update tbl_auth set password = :pwd where userID = :uid
	");
	if($statement->execute(
		array(
			':uid'       =>  $uid,
      ':pwd'       =>  password_hash($pwd,PASSWORD_DEFAULT)
		)
	)){
    echo  'true';
  } else {
    echo 'false';
  }
}

function updateMedic($userID,$bloodType,$weight,$height,$connect){
  $statement = $connect->prepare("select * from tbl_medicinfo where userID = :uid");
  //$statement->execute();
  //$result = $statement->fetchAll();
  if($statement->execute(
    array(
      ':uid' => $userID
    )
  )){
    $count = $statement->rowCount();
    if($count > 0)
    {
      $statement = $connect->prepare("
        update tbl_medicinfo set bloodType = :bloodType,weight = :weight,height = :height where userID = :userID
    	");
      if($statement->execute(
    		array(
    			':userID'       =>  $userID,
          'bloodType' => $bloodType,
          'weight' => $weight,
          'height' => $height,
    		)
    	)){
        echo 'true';
      } else {
        echo 'false';
      }
    } else {
      $statement = $connect->prepare("
        insert into tbl_medicinfo(UUID,userID,bloodType,weight,height) values(:UUID,:userID,:bloodType,:weight,:height)
    	");
      if($statement->execute(
    		array(
          'UUID' => uniqid(),
          'bloodType' => $bloodType,
          'weight' => $weight,
          'height' => $height,
    			':userID'       =>  $userID
    		)
    	)){
        echo 'true';
      } else {
        echo 'false';
      }
    }
  } else {
    echo "false1";
  }


}
 ?>
