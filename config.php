<?php
session_start();
$dbHost = 'sict-mysql.mandela.ac.za';
$dbName = 'oauydc_db';
$dbUsername = 'grp46';
$dbPassword = 'grp46-2021';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if($dbc == false){
    die("Error: Could not connect. ");
}
?>