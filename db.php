<?php
// $servername = "localhost";
// $username = "root";
// $password = "1234";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=ajax", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

	$conn = mysqli_connect("localhost","root","1234");
	mysqli_select_db($conn,'ajax');
?>