<?php
require_once("mysqli_connect.php");


 if ( isset($_POST['submit']) ) {

   	$empid = $_POST["id"];
    $fn = $_POST["firstname"];
    $ln = $_POST["lastname"];
   	$username = $_POST["username"];
   	$password = $_POST["password"];
   	$confpass = $_POST["retypepass"];
    $gender = $_POST["gender"];
    $bday = $_POST["birthdate"];
    $dept = $_POST["department"];
    $sss = $_POST["sssnumber"];
    $yremp = $_POST["yremployed"];
   	$pos = $_POST["position"];
    $sal = $_POST["salary"];
    $leave = $_POST["leaves"];

}
  $query = mysqli_query($dbconn, "INSERT into emp_details
                        (employeeID, firstName, lastName, birthDate,
                          department, sssNumber, yearEmployed, position,
                          salary, allowedRemainingLeaves, username,
                          password, GENDER)
        VALUES ('$empid','$fn','$ln','$bday','$dept','$sss','$yremp','$pos',
                '$sal','$leave','$username' , '$password' , '$gender')");

    if($query){
      session_start();
      $username=$_SESSION['username'];
      header('location:homeAdmin.php');
    }else {
      echo "ERROR: " .$query. "<br>";
    }

 ?>
