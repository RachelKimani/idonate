<?php
include '../db/db.php';
include '../functions/auth.php';

if (isset($_POST["facility"])) {
	createFacility ($_POST["fName"] , $_POST["phone"] , $_POST["type"] , $_POST["address"] ,$_POST["city"],$_POST["country"], $_POST["cordinates"] , $connect);
}
if (isset($_POST["ufacility"])) {
	updateFacility ($_POST["ufacility"],$_POST["fName"] , $_POST["phone"] , $_POST["type"] , $_POST["address"] ,$_POST["city"],$_POST["country"], $_POST["cordinates"] , $connect);
}
if(isset($_POST["updatef"])){
	updateF($_POST["id"],$_POST["updatef"],$connect);
}
if(isset($_POST["fetchf"])){
	fetchFacility($_POST["id"],$connect);
}
if(isset($_POST["assf"])){
	fetchFacility(uniqid(),$_POST["id"],$_POST["uid"],$connect);
}
?>
