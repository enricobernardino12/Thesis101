<html>
<head><link rel="stylesheet" href=""></head>

<?php
require 'core.php';
?>
<?php
include('mysqli_connect.php');
if (!isset($_SESSION['username'])){
header('location:login.php');
}
?>
<p>Dashboard</p>
<?php
	$username=$_SESSION['username'];
	$result = mysqli_query($dbconn,"SELECT * FROM emp_details where username='$username'")
	or die(mysql_error());

	echo '<link rel="stylesheet" href="ktrbh.css">';

	echo '<form method="POST" action="logout.php" class="empdisplay">';
	echo "<h2>WELCOME BACK, <h1>" .$username. "!</h1></h2>";
	echo "<h4></h4>";
	echo "<table class='empdeet'>";
	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {

		echo '<link rel="stylesheet" href="ktrbh.css">';
		echo "<tr>";
		echo "<td>Employee ID : </td><td>". $row['employeeID'] . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Name : </td><td>". $row['firstName'] ." ".$row['lastName']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Birth Date : </td><td>". $row['birthDate']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Gender :</td><td> " . $row['GENDER']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Department : </td><td>". $row['department']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>SSS Number : </td><td>". $row['sssNumber']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Year Employed :</td><td> ". $row['yearEmployed']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Position : </td><td>". $row['position']. "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Allowed Remaining <br>Leave/s : </td><td>". $row['allowedRemainingLeaves']. "</td>";
		echo "</tr>";
		echo "<table>";
		echo '<br><br><center>';
		echo '<a href="leave.html"><small>LEAVE/S APPLICATION</small></a>';
		echo '<h4></h4><input type="submit" value="LOGOUT"/>';
		echo '<br><br></center></form>';
	}

	?>
	</html>
