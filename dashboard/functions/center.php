<?php
function fetchCenter($connect)
{
    $centers = '';
    $statement = $connect->prepare("
      SELECT * from tbl_centers where status = 'active' order by name ");
    if($statement->execute()){
      $count = $statement->rowCount();
      if($count>0){
        $result = $statement->fetchAll();
        if (!$result) {
          $centers.= '<option value="">No active centers found</option>';
        } else {
          foreach($result as $row)
          {
            $centers.= '<option value="'.$row['id'].'">'.$row['name'].'('.$row['city'].')</option>';
          }
        }
      } else {
        $centers.= '<option value="">No active centers found</option>';
      }

    } else {
      $centers.= '<option value="">Error fetching records</option>';
    }

    echo $centers;
}
 ?>
