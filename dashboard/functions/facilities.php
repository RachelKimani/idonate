<?php
include '../db/db.php';
header('Content-Type: application/json');
function fetchFacilities($connect){
  	$sub_array = array();
    $data = array();

  $statement = $connect->prepare("
    SELECT * from tbl_centers order by centerID desc");
  if($statement->execute()){
    $count = $statement->rowCount();
      $result = $statement->fetchAll();
      if (!$result) {
        //echo 'notfound';
      } else {
        foreach($result as $row)
        {
              if($row['status']=='active'){
                $stat ='<div class="badge badge-success badge-success-alt">Enabled</div>';
                $act = '
                <a class="dropdown-item edit"  aid="'.$row['centerID'].'"><i class="bx bxs-pencil mr-3"></i> Edit</a>
                <a class="dropdown-item text-warning disable" aid="'.$row['centerID'].'"><i class="bx bxs-user-x mr-3"></i> Disable Donation</a>
                <a class="dropdown-item text-danger delete" aid="'.$row['centerID'].'"><i class="bx bxs-trash mr-3"></i> Delete Facility</a>';
              } else if($row['status']=='disabled') {
                $stat ='<div class="badge badge-warning badge-danger-alt">Disabled</div>';
                $act = '
                <a class="dropdown-item edit"  aid="'.$row['centerID'].'"><i class="bx bxs-pencil mr-3 edit"></i> Edit</a>
                <a class="dropdown-item text-success restore" aid="'.$row['centerID'].'"><i class="bx bxs-user-check mr-3"></i> restore Donation</a>
                <a class="dropdown-item text-danger delete" aid="'.$row['centerID'].'"><i class="bx bxs-trash mr-3"></i> Delete Facility</a>
                ';
              } else {
                $stat ='<div class="badge badge-danger badge-danger-alt">Facility Unavailable</div>';
                $act = '<a class="dropdown-item restore" aid="'.$row['centerID'].'"><i class="bx bx-reset mr-3"></i> Restore Faciility</a>';
              }


              $sub_array[] = '<a >
                    <div class="address">
                      <p class="font-weight-bold mb-0">'.$row["name"].'</p>
                      <p class="text-muted mb-0">'.$row["contact"].'</p>
                      <p class="text-muted mb-0">'.ucwords($row['city'].','.$row['country']).'</p>
                    </div>
                  </div>
                </a>';
                $sub_array[] = ucwords($row['type']);
                $sub_array[] = $stat;
                $sub_array[] = '<div id="address" class="address">'.$row["address"].'</div>';
                $sub_array[] = '<div id="address1" class="address">'.$row['cordinates'].'</div>';
                $sub_array[] = '<div class="dropdown">
                  <button class="btn btn-sm btn-icon" type="button" id="'.$row['centerID'].'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
fetchFacilities($connect);
 ?>
