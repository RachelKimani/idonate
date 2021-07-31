<?php
//database_connection.php

$connect = new PDO('mysql:host=localhost;dbname=idonate', 'root', '');
$SETTINGS["mysql_user"]='root';
$SETTINGS["mysql_pass"]='';
$SETTINGS["hostname"]='localhost';
$SETTINGS["mysql_database"]='idonate';

/* Connect to MySQL */

$mysqli = new mysqli($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"],$SETTINGS["mysql_database"]);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(!isset($_SESSION)) {session_start();}

?>
