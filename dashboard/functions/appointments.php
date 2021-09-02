<?php
function makeAppointments($connect,$date,$facility,$userid)
{
  $query = "insert into tbl_appointments(aid,userid,facility,date) values(:aid,:userid,:facility,:date)";
  $statement = $connect->prepare($query);
  if($statement->execute(
		array(
        ':aid' => uniqid(),
        ':userid' => $userid,
        ':facility' => $facility,
        ':date' => $date
		)
	)){
    echo "success";
  } else {
    echo "failed";
  }
}
function invalidatePass($connect){
  $query1 = 'UPDATE tbl_pass set status="Expired" WHERE now() NOT BETWEEN date and (date + INTERVAL 24 HOUR) ORDER by date DESC';
  $statement1 = $connect->prepare($query1);
  if($statement1->execute()){
    $count1 = $statement1->rowCount();
    if($count1>0){
      //return "false";
    } else {
      //return "true";
    }
  }
}
function checkPass($connect,$id)
{
  invalidatePass($connect);
  $query = "SELECT date,(date + INTERVAL 24 HOUR) as expires  from tbl_pass WHERE (now() BETWEEN date and (date + INTERVAL 24 HOUR)) AND userID=:userid ORDER by date DESC";
  if($statement->execute(
    array(':id' => $id )
  )){
    $count = $statement->rowCount();
    if($count>0){
      return "false";
    } else {
      return "true";
    }
  }
}
//get expired passes
//SELECT date,(date + INTERVAL 24 HOUR) as expires  from tbl_pass WHERE now() NOT BETWEEN date and (date + INTERVAL 24 HOUR) ORDER by date DESC
function getStatus($connect,$id){
  $query = "select * from tbl_appointments where userid = :id and date >= CURDATE()";
  $query1 = 'UPDATE `tbl_appointments` SET `status` = "missed" WHERE `tbl_appointments`.`status` = "pending" AND date < CURDATE()';
  invalidatePass($connect);
  $statement1 = $connect->prepare($query1);
  if($statement1->execute()){
    $count1 = $statement1->rowCount();
    if($count1>0){
      //return "false";
    } else {
      //return "true";
    }
  }
  $statement = $connect->prepare($query);
  if($statement->execute(
    array(':id' => $id )
  )){
    $count = $statement->rowCount();
    if($count>0){
      return "false";
    } else {
      return "true";
    }
  }
}

function checkApp($connect,$uid){
  $query = 'select * FROM tbl_appointments where status = "pending" order';
  invalidatePass($connect);
  $statement = $connect->prepare($query);
  if($statement->execute()){
    $count = $statement->rowCount();
    if($count>0){
      return "false";
    } else {
      return "true";
    }
  }

}
function updateAppointments($connect,$id,$status,$date='')
{
  $query = "update tbl_appointments set status = '$status'";
  if($date!=''){
    $query .= ", date = '$date'";
  }
  $query .= " where userid = '$id' or aid='$id'";
  $statement = $connect->prepare($query);
  if($statement->execute()){
    //echo "success";
    invalidatePass1($connect);
  } else {
    //echo "failed";
  }
}
function updateAppointments2($connect,$id,$status,$date='')
{
  $query = "update tbl_appointments set status = '$status'";
  if($date!=''){
    $query .= ", date = '$date'";
  }
  $query .= " where userid = '$id' or aid='$id'";
  $statement = $connect->prepare($query);
  if($statement->execute()){
    echo "success";
    invalidatePass1($connect);
  } else {
    echo "failed";
  }
}
function invalidatePass1($connect){
  $query1 = 'UPDATE tbl_pass set status="Expired" WHERE now() NOT BETWEEN date and (date + INTERVAL 24 HOUR) ORDER by date DESC';
  $statement1 = $connect->prepare($query1);
  if($statement1->execute()){
    $count1 = $statement1->rowCount();
    if($count1>0){
      //return "false";
    } else {
      //return "true";
    }
  }

  $query2 = 'UPDATE `tbl_appointments` SET `status` = "missed" WHERE (`tbl_appointments`.`status` = "Accepted" OR `tbl_appointments`.`status` = "pending") AND date < CURDATE()';
  $statement2 = $connect->prepare($query2);
  if($statement2->execute()){
    $count2 = $statement2->rowCount();
    if($count2>0){
      //return "false";
    } else {
      //return "true";
    }
  }
}
function getFacilities($connect,$lat='',$lng=''){
  $query = 'select * FROM tbl_centers where status = "active" order by name ASC';
  $statement = $connect->prepare($query);
  if($statement->execute()){
    $count = $statement->rowCount();
      $result = $statement->fetchAll();
      if (!$result) {
        //echo 'notfound';
      } else {
        foreach($result as $row)
        {
        echo '
          <option value="'.$row['centerID'].'">'.ucwords($row["name"]).' ('.ucwords($row["type"]).')</option>
        ';
        }
      }
    }
}
function fetchAppointments($userid,$connect)
{
      $sub_array = array();
      $data = array();
      if($_SESSION['userType']=='user'){
        $query = "SELECT distinct
        t.aid,t.status,t.date,t.userID,
        f.name,f.address,f.city,f.country,f.contact,f.type
        from tbl_appointments t
        left join tbl_centers f on f.centerID = t.facility
        where t.userid = '$userid' order by t.date DESC";
      }else {
        $query = "SELECT distinct
        t.aid,t.status,t.date,t.userID,
        f.name,f.address,f.city,f.country,f.contact,f.type
        from tbl_appointments t
        left join tbl_centers f on f.centerID = t.facility order by t.date DESC";
      }

      $query2="select status,(date + INTERVAL 24 HOUR) as expires from tbl_pass where userID = :userid and status = 'Accepted' order by date desc limit 1";
      $statement = $connect->prepare($query);
      $statement2 = $connect->prepare($query2);
      if($statement->execute()){
        $count = $statement->rowCount();
        $result = $statement->fetchAll();
        $pstatus = "N/A";
        $expires = "";
        if (!$result) {
          //print_r($statement->errorInfo());
        } else {
          foreach($result as $row)
          {
            if($statement2->execute(
              array(
                ':userid' => $userid
              )
            )){
                $count2 = $statement2->rowCount();
                $result2 = $statement2->fetchAll();
                if($count2>0){
                  foreach($result2 as $row2)
                  {
                    $pstatus = $row2['status'];
                    $expires = $row2['expires'];
                  }
                }
            }

            if(!isset($_SESSION)) {session_start();}
            $acb = '';
            $act='';
            $bb= 'Not Assigned';
            if($_SESSION['userType']=='user'){
              if($row['status']=='Accepted'){
                $act = '
                <a class="dropdown-item text-danger accept" aid="'.$row['aid'].'"><i class="bx bxs-trash mr-3"></i> Cancel Appointment</a>';
                if($pstatus=='Accepted'){
                  $acb = '<button class="btn btn-info btn-md download" href="#"><i class="fa fa-download">&nbsp Download Pass</i></button>';
                  if($expires!=''){
                      $acb .= '<p class="text-muted mb-0">Pass Expires on: '.$expires.'</p>';
                  }
                }
              } else if($row['status']=='donated') {
                $act = '
                <a class="dropdown-item review"  aid="'.$row['aid'].'"><i class="bx bxs-pencil mr-3 edit"></i>Add Review</a>
                <a class="dropdown-item text-success view" aid="'.$row['aid'].'"><i class="bx bxs-user-check mr-3"></i>View Donation</a>
                ';
              } else if($row['status']=='missed') {
                $act = 'N/A';
              } else {
                $act = 'N/A';
                if($pstatus != 'Rejected'){
                  $act = '<button class="btn btn-info btn-md test" href="#"><i class="fa fa-plus">&nbsp Take Pre-Test</i></button>';
                }
              }
            } else {
              if($row['status']=='pending'){
                $act = '
                <a class="dropdown-item accept"  stat="Accepted" aid="'.$row['aid'].'"><i class="fa fa-check"></i>&nbspAccept Appointment</a>
                <a class="dropdown-item text-danger accept" stat="Rejected" aid="'.$row['aid'].'"><i class="bx bxs-trash mr-3"></i>Cancel Appointment</a>
                ';
              } else if($row['status']=='Accepted'){
                $act = '
                <a class="dropdown-item assign"  aid="'.$row['aid'].'"><i class="bx bxs-pencil mr-3 edit"></i>Assign Blood Bag</a>
                <a class="dropdown-item text-danger accept" stat="Rejected" aid="'.$row['aid'].'"><i class="bx bxs-trash mr-3"></i> Reject Donor</a>';
                if($pstatus=='Accepted'){
                  $acb = '<button class="btn btn-info btn-md download" href="#"><i class="fa fa-download">&nbsp View Pass</i></button>';
                  if($expires!=''){
                      $acb .= '<p class="text-muted mb-0">Pass Expires on: '.$expires.'</p>';
                  }
                }
              } else if($row['status']=='assigned') {
                $act = '
                <a class="dropdown-item accept"  stat="donating" aid="'.$row['aid'].'"><i class="bx bxs-pencil mr-3 edit"></i>Start Donation</a>
                ';
                $bb='assigned';
              }
              else if($row['status']=='donated') {
                $act = '
                <a class="dropdown-item review"  aid="'.$row['aid'].'"><i class="bx bxs-pencil mr-3 edit"></i>Add Review</a>
                <a class="dropdown-item text-success view" aid="'.$row['aid'].'"><i class="bx bxs-user-check mr-3"></i>View Donation</a>
                ';
              } else if($row['status']=='donating') {
                $act = '
                <a class="dropdown-item complete"  aid="'.$row['aid'].'"><i class="fa fa-check edit"></i>Complete Donation</a>
                ';
                $bb='assigned';
              } else {
                $act = 'N/A';
              }
            }
            if ($_SESSION['userType']=='user') {
              $head ='<a >
                    <div class="address">
                      <p class="font-weight-bold mb-0">'.$row["name"].'</p>
                      <p class="text-muted mb-0">Contact: '.$row["contact"].'</p>
                      <p class="text-muted mb-0">Type: '.ucwords($row['type']).'</p>
                      <p class="text-muted mb-0">Address: '.ucwords($row['city']).','.ucwords($row['country']).'</p>
                      '.$acb.'
                    </div>
                  </div>
                </a>';
            } else {
              $user = getUser($row['userID'],$connect);
              $meds= fetchMeds1($row['userID'],$connect);
              $med = '<a class="dropdown-item add"  aid="'.$row['aid'].'"><i class="bx bxs-pencil mr-3 edit"></i>Add</a>';
              if($meds['bloodType']!=''){
                $med = $meds['bloodType'];
              }
              $head = '<a >
                    <div class="address">
                      <p class="font-weight-bold mb-0">'.$user['fullName'].'</p>
                      <p class="text-muted mb-0">Contact: '.$user["phone"].'</p>
                      <p class="text-muted mb-0">Blood Group: '.$med.'</p>
                      <p class="text-muted mb-0">Gender: '.$user['gender'].'</p>
                      <p class="text-muted mb-0">Weight: '.$meds['weight'].'</p>
                      '.$acb.'
                    </div>
                  </div>
                </a>';
            }

            $sub_array[] = $head;
            $sub_array[] = ucwords($row['status']);
            $sub_array[] = $row['date'];
            $sub_array[] = $bb;
            $sub_array[] = $act;

            array_push($data,$sub_array);
            $sub_array=[];
          }
        }
    } else {
      //print_r($statement->errorInfo());
    }
    $output = array(
    "data"    			=> 	$data
    );
    echo json_encode($output);
}
//add results
function addTest($id,$userID,$results,$status,$comment,$connect)
{
  $query = "insert into tbl_pass(id,userID,results,status,comment) values(:id,:userID,:results,:status,:comment)";
  updateAppointments($connect,$userID,$status);
  $statement = $connect->prepare($query);
  if($statement->execute(
    array(
      ':id' => $id,
      ':userID' => $userID,
      ':results' => $results,
      ':status' => $status,
      ':comment' => $comment,
    )
  )){
    echo "success";
  } else {
    echo "failed";
    print_r($statement->errorInfo());
  }
}
//get user details
function getUser($id,$connect){
  $output=array();
  $query = "
  SELECT
  u.email,u.firstName,u.lastName,u.username,u.gender,u.address,u.dob,u.phone,u.profileUrl,
  r.userType,r.userRole,
  a.privateKey,a.password,a.status,a.dateCreated
  FROM tbl_users u
  LEFT JOIN tbl_roles r on u.userID = r.userID
  LEFT JOIN tbl_auth a   on u.userID   = a.userID
  where u.email = :email or u.userID = :email";
	$statement = $connect->prepare($query);
	if($statement->execute(
    array(
    ':email'       =>  $id
  )
)) {
  $result = $statement->fetchAll();
	foreach($result as $row)
	{
    $age = date_diff(date_create($row['dob']), date_create('today'))->y;
    $age.=' Y';

    $output['email'] = $row['email'];
    $output['fullName'] = $row['firstName']." ".$row['lastName'];
    $output['firstName'] = $row['firstName'];
    $output['lastName'] = $row['lastName'];
    $output['username'] = $row['username'];
    $output['gender'] = $row['gender'];
    $output['address'] = $row['address'];
    $output['dob'] = $row['dob'];
    $output['phone'] = $row['phone'];
    $output['privateKey'] = $row['privateKey'];
    $output['password'] = $row['password'];
    $output['profileUrl'] = '/idonate/dashboard/profile/'.$row['profileUrl'];
    $output['userID'] = $id;
    $output['dateCreated'] = $row['dateCreated'];
    $output['age'] = $age;
	}
} else {
  $output = $statement->errorInfo();
}

	return $output;
}
//get medical info
function fetchMeds1($id,$connect){
  $output=array();
  $query = "
  SELECT * FROM tbl_medicinfo
  where userID = :email";
	$statement = $connect->prepare($query);
	if($statement->execute(
    array(
    ':email'       =>  $id
  )
)) {


    $count = $statement->rowCount();
    if($count > 0)
    {
      $result = $statement->fetchAll();
      foreach($result as $row)
      {
        $output['bloodType'] = $row['bloodType'];
        $output['weight'] = $row['weight'];
        $output['height'] = $row['height'];
        $output['specialNotes'] = $row['specialNotes'];
      }
    } else {
      $output['bloodType'] = '';
      $output['weight'] = '';
      $output['height'] = '';
      $output['specialNotes'] = '';
      //$output = $statement->errorInfo();
    }
  } else {
    $output['err'] = $statement->errorInfo();
    $output['bloodType'] = '';
    $output['weight'] = '';
    $output['height'] = '';
    $output['specialNotes'] = '';
  }

	return $output;
}
//add donation
function addDonation($connect,$bag_number,$quantity,$appointment_id,$donation_type,$donation_start)
{
  $donation_id=uniqid();
  $query = "INSERT INTO tbl_donations(donation_id,bag_number,quantity,appointment_id,donation_type,donation_start)
  values('$donation_id','$bag_number','$quantity','$appointment_id','$donation_type','$donation_start')";
  $statement1 = $connect->prepare($query);
  if($statement1->execute()){
    echo "success";
    updateAppointments($connect,$appointment_id,'donating');
  } else {
    echo "failed";
    print_r($statement1->errorInfo());
  }
}
function updateDonation($connect,$id,$status,$date='',$comment=''){
  $query = "update tbl_donations set donation_status='$status'";
  if($date!=''){
    $query.=" ,donation_end = '$date'";
  }
  if($comment!=''){
    $query.=" ,donation_comments = '$comment'";
  }
  $query .= " where appointment_id = '$id'";

  $statement1 = $connect->prepare($query);
  if($statement1->execute()){
    echo "success";
  } else {
    echo "failed";
  }
}

function viewDonations($connect){
  $query="SELECT * FROM donation_report";
// TODO:
}

function checkDonation($connect,$uid){
  $query = "Select date,DATE_ADD(date, INTERVAL 120 DAY) as exp FROM tbl_appointments where userid ='$uid' and (date between curdate() AND curdate() + 120) and status = 'donated'";
  invalidatePass($connect);
  $statement = $connect->prepare($query);
  if($statement->execute()){
    $count = $statement->rowCount();
    if($count>0){
      return "false";
    } else {
      return "true";
    }
  }

}
function retrieveDonation($connect,$uid){
  $query = "Select date,DATE_ADD(date, INTERVAL 120 DAY) as exp FROM tbl_appointments where userid ='$uid' and (date between curdate() AND curdate() + 120) and status = 'donated'";
  invalidatePass($connect);
  $statement = $connect->prepare($query);
  if($statement->execute()){
        $result = $statement->fetchAll();
        if (!$result) {
          //echo "failed";
        } else {
          foreach($result as $row)
          {
            $sub_array['date']=$row['name'];
            $sub_array['expiry']=$row['exp'];
            $data=$sub_array;
            $sub_array=[];
          }
          return $data;
          }
    }

}
 ?>
