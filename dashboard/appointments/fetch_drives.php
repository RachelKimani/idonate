<?php
include '../db/db.php';
include '../functions/blooddrives.php';
include '../functions/appointments.php';
date_default_timezone_set("Africa/Nairobi");
if(isset($_POST["lat"])&&isset($_POST["lng"])){
	fetchDrives($_POST["lat"],$_POST["lng"],$connect);
} elseif(isset($_GET["lat"])&&isset($_GET["lng"])){
	fetchDrives($_GET["lat"],$_GET["lng"],$connect);
}
if(isset($_POST['booking'])){
	if(getStatus($connect,$_POST['userid'])=='true'){
		makeAppointments($connect,$_POST['date'],$_POST['facility'],$_POST['userid']);
	} else {
		echo "invalid";
	}
}
if(isset($_GET['cent'])){

	header('Content-Type: application/json');
	if(!isset($_SESSION)){session_start();}
	fetchAppointments($_SESSION['userID'],$connect);
}
if(isset($_POST['addDonation'])){
	addDonation($connect,$_POST['bag_number'],$_POST['quantity'],$_POST['appointment_id'],$_POST['donation_type'],date("Y-m-d H:i:s"));
}
if(isset($_POST['completeDonation'])){
	updateDonation($connect,$_POST['appointment_id'],"donated",date("Y-m-d H:i:s"));
	updateAppointments($connect,$_POST['appointment_id'],'donated');
}
if(isset($_POST['addComment'])){
	updateDonation($connect,$_POST['appointment_id'],"donated","",$_POST['comment']);
}
if(isset($_POST['updateAppointment'])){
	updateAppointments2($connect,$_POST['appointment_id'],$_POST['status']);
}
//fetchAppointments($_SESSION['userID'],$connect);
?>
