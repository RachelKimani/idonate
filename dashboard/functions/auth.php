<?php
function login($email,$password,$connect,$key=''){
  date_default_timezone_set('Africa/Nairobi');
  $t=time();
  $loginTime =date("Y-m-d h:i:s",$t);
  //get user ip
  $userIP = '::1';
  $sessionLocality = 'Unknown Location';
  //get user location and ip
  $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
  if ($query && $query['status'] == 'success') {
    $sessionLocality = $query['city'] . ',' . $query['country'];
    $userIP = $query['query'];
  }
  $statement = $connect->prepare("
    SELECT
    u.userID,u.firstName,u.lastName,u.username,u.gender,u.address,
    r.userType,r.userRole,
    a.privateKey,a.password,a.status,a.dateCreated
    FROM tbl_users u
    LEFT JOIN tbl_roles r on u.userID = r.userID
    LEFT JOIN tbl_auth a   on u.userID   = a.userID
    where u.email = :email
	");
	if($statement->execute(
		array(
			':email'       =>  $email
		)
	)){
    $count = $statement->rowCount();
  	if($count > 0)
  	{
      $result = $statement->fetchAll();
			if (!$result) {
    		echo 'notfound';
			} else {
				foreach($result as $row)
				{
					if($row['status'] == 'active')
					{
						if(password_verify($password, $row["password"]))
						{
              session_start();
              $_SESSION['userName'] = $row['firstName']." ".$row['lastName'];
              $_SESSION['gender'] = $row['gender'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['userID'] = $row['userID'];
              $_SESSION['userRole'] = $row['userRole'];
              $_SESSION['userType'] = $row['userType'];
              $_SESSION['log'] = "unlocked";
              $query1 = "
              INSERT INTO tbl_instance (userID,userIP,loginTime,sessionLocality)
              VALUES (:userID,:userIP,:loginTime,:sessionLocality)
              ";
              $statement1 = $connect->prepare($query1);
              if($statement1->execute(
                array(
                  ':userID'  => $row['userID'],
                  ':userIP'  => $userIP,
                  ':loginTime'  => $loginTime,
                  ':sessionLocality'  => $userIP
                )
              )){
                echo "success";
              } else {
                echo "success1";
              }

            } else {
              echo "wrongpwd";
            }
          } else {
            echo "disabled";
          }
        }
      }
    } else {
      echo "notfound";
    }
  }
}

//register function
function register($userID,$firstName,$lastName,$username,$gender,$address,$email,$phone,$dob,$privateKey,$password,$dateCreated,$connect)
{
  $query = "
  INSERT INTO tbl_users (userID,firstName,lastName,username,gender,address,email,phone,dob)
  VALUES (:userID,:firstName,:lastName,:username,:gender,:address,:email,:phone,:dob)
  ";
  $statement = $connect->prepare($query);
  if($statement->execute(
    array(
      ':userID'		=>	$userID,
      ':firstName'		=>	$firstName,
      ':lastName'		=>	$lastName,
      ':username'		=>	$username,
      ':gender'		=>	$gender,
      ':address'		=>	$address,
      ':email'		=>	$email,
      ':phone'		=>	$phone,
      ':dob'		=>	$dob
    )
  )){
    $query1 = "
    INSERT INTO tbl_auth (userID,privateKey,password,dateCreated)
    VALUES (:userID,:privateKey,:password,:dateCreated)
    ";
    $statement1 = $connect->prepare($query1);
    if($statement1->execute(
      array(
        ':userID'		=>	$userID,
        ':privateKey'		=>	$privateKey,
        ':password'		=>	$password,
        ':dateCreated' => $dateCreated
      )
    )){
      $query2 = "
      INSERT INTO tbl_roles (userID)
      VALUES (:userID)
      ";
      $statement2 = $connect->prepare($query2);
      if($statement2->execute(
        array(
          ':userID'		=>	$userID
        )
      )){
        echo "success";
      }else {
        echo "Registration failed at step 3";
      }
    }else {
      echo "Registration failed at step 2";
    }
  } else {
    echo "Registration failed at step 1";
  }
}
function resetPassword()
{

}
function updateRecord()
{

}
 ?>