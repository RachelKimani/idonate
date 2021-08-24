<?php
include '../db/db.php';
include '../functions/blooddrives.php';
if(isset($_POST["lat"])&&isset($_POST["lng"])){
	fetchDrives($_POST["lat"],$_POST["lng"],$connect);
} elseif(isset($_GET["lat"])&&isset($_GET["lng"])){
	fetchDrives($_GET["lat"],$_GET["lng"],$connect);
} else {
  echo json_encode(array(
    "status"=>"404",
    "message" => "Invalid parameters"
), JSON_PRETTY_PRINT);
}
 ?>