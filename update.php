<?php
require_once("mysqli_connect.php");
session_start();

if(isset($_POST['submit'])){
	$empid = $_POST["id"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$dept = $_POST["department"];
	$pos = $_POST["position"];
	$sal = $_POST["salary"];
	$leave = $_POST["leaves"];

$result = mysqli_query($dbconn, "SELECT * FROM emp_details WHERE employeeID = $empid LIMIT 1")	or die(mysql_error());
while ($row = mysqli_fetch_array($result)){

	$fn = $row["firstName"];
	$ln = $row["lastName"];
	$gender = $row["GENDER"];
	$bday = $row["birthDate"];
	$sss = $row["sssNumber"];
	$yremp = $row["yearEmployed"];
}

$stmt = mysqli_query($dbconn, "UPDATE emp_details SET employeeID = '$empid',
										firstName = '$fn', lastName = '$ln',
										birthDate = '$bday', department = '$dept',
										sssNumber = '$sss', yearEmployed = '$yremp',
										position='$pos', salary='$sal', allowedRemainingLeaves='$leave',
										username='$username', password='$password', GENDER = '$gender'
										WHERE employeeID = $empid LIMIT 1");

	if($stmt) {
		$username=$_SESSION['username'];
		header('location:homeAdmin.php');
	}
	else {
		echo 'kutch';
		echo mysqli_error($dbconn);
	}
}
?>
