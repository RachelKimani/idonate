<?php
include '../db/db.php';
header('Content-Type: application/json');
function fetchUsers($by,$connect){
  	$sub_array = array();
    $data = array();

  date_default_timezone_set('Africa/Nairobi');
  $t=time();
  $fetchTime =date("Y-m-d h:i:s",$t);
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
    u.userID,u.firstName,u.lastName,u.email,u.username,u.gender,u.phone,u.dob,u.address,u.profileUrl,
    r.userType,r.userRole,
    a.privateKey,a.password,a.status,a.dateCreated
    FROM tbl_users u
    LEFT JOIN tbl_roles r on u.userID = r.userID
    LEFT JOIN tbl_auth a   on u.userID   = a.userID
  ");
  if($statement->execute()){
    $count = $statement->rowCount();
      $result = $statement->fetchAll();
      if (!$result) {
        //echo 'notfound';
      } else {
        foreach($result as $row)
        {
          $words = explode(" ", $row['firstName']." ".$row['lastName']);
          $acronym = "";

          foreach ($words as $w) {
            $acronym .= $w[0];
          }
            if($row['profileUrl']==''){
                $img1='<div class="avatar avatar-blue mr-3">'.$acronym;

            } else {
                $img1 = '<div class="avatar mr-3"><img src="/idonate/dashboard/profile/'.$row['profileUrl'].'">';
            }
              if($row['status']=='active'){
                $stat ='<div class="badge badge-success badge-success-alt">Enabled</div>';
                $act = '
                <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-3"></i> Change Password</a>
                <a class="dropdown-item text-warning" href="#"><i class="bx bxs-user-x mr-3"></i> Disable App Access</a>
                <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-3"></i> Delete User</a>';
              } else if($row['status']=='disabled') {
                $stat ='<div class="badge badge-warning badge-danger-alt">Disabled</div>';
                $act = '
                <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-3"></i> Change Password</a>
                <a class="dropdown-item text-success" href="#"><i class="bx bxs-user-check mr-3"></i> Enable App Access</a>
                <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-3"></i> Delete User</a>
                ';
              } else {
                $stat ='<div class="badge badge-danger badge-danger-alt">Deleted</div>';
                $act = '<a class="dropdown-item" href="#"><i class="bx bx-reset mr-3"></i> Restore User</a>';
              }

              $sub_array[] = '<a href="#">
                  <div class="d-flex align-items-center">
                    '.$img1.'</div>

                    <div class="">
                      <p class="font-weight-bold mb-0">'.$row["firstName"].' '.$row["lastName"].'</p>
                      <p class="text-muted mb-0">'.$row["email"].'</p>
                      <p class="text-muted mb-0">'.ucwords($row["gender"]).'</p>
                    </div>
                  </div>
                </a>';
                $sub_array[] = $row['phone'];
                $sub_array[] = '<div id="address" class="address">'.$row['address'].'</div>';
                $sub_array[] = $row['userType'];
                $sub_array[] = $row['dob'];
                $sub_array[] = $stat;
                $sub_array[] = '<div class="dropdown">
                  <button class="btn btn-sm btn-icon" type="button" id="'.$row['userID'].'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                          title="Actions"></i>
                      </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                    '.$act.'
                  </div>
                </div>';
                array_push($data,$sub_array);
                $sub_array=[];


        }
      }
  }


  //print_r($data);
  $output = array(
	"data"    			=> 	$data
  );
  echo json_encode($output);
}
fetchUsers('$by',$connect);
 ?>
