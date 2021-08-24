<?php
include '../db/db.php';
header('Content-Type: application/json');
function fetchDrives($lat,$lng,$connect){
  	$sub_array = array();
    $data = array();
    $query = "SELECT
      name,address,city,country,type,contact,status,cordinates,SUBSTRING_INDEX(cordinates, ',', 1) AS lat,
      SUBSTRING_INDEX(cordinates, ',', -1) AS lng, (
            6371 * acos (
            cos ( radians($lat) )
            * cos( radians( SUBSTRING_INDEX(cordinates, ',', 1) ) )
            * cos( radians( SUBSTRING_INDEX(cordinates, ',', -1) ) - radians($lng) )
            + sin ( radians($lat) )
            * sin( radians( SUBSTRING_INDEX(cordinates, ',', 1) ) )
          )
      ) AS distance
      FROM tbl_centers
      HAVING distance < 100
      ORDER BY distance
      LIMIT 0 , 20";
  $statement = $connect->prepare($query);
  if($statement->execute()){
    $count = $statement->rowCount();
      $result = $statement->fetchAll();
      if (!$result) {
        //echo 'notfound';
      } else {
        foreach($result as $row)
        {
              if($row['status']=='active'){
                $sub_array["name"] = $row['name'];
                $sub_array["address"] = $row['address'];
                $sub_array["city"] = $row['city'];
                $sub_array["country"] = $row['country'];
                $sub_array["type"] = $row['type'];
                $sub_array["contact"] = $row['contact'];
                $sub_array["status"] = $row['status'];
                $sub_array["cordinates"] = $row['cordinates'];
                $sub_array["lat"] = $row['lat'];
                $sub_array["lng"] = $row['lng'];
                $sub_array["distance"] = $row['distance'];
                array_push($data,$sub_array);
                $sub_array=[];
              }
        }
      }
  }


  //print_r($data);
  $output = $data;
  echo json_encode($output, JSON_PRETTY_PRINT);
}
 ?>