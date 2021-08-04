<?php 
include '../dashboard/db/db.php';
include '../dashboard/functions/auth.php';

if (isset($_POST["facility"])) {
	createFacility ($_POST["fName"] , $_POST["phone"] , $_POST["type"] , $_POST["address"] ,$_POST["city"],$_POST["country"], $_POST["cordinates"] , $connect);
}
 ?>