<?php
	$Email = $_POST['Email'];
    $username = $_POST['username'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','dbms');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into reg(Email,username,password) values(?, ?, ?)");
		$stmt->bind_param("sss",$Email,$username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "record added";
		$stmt->close();
		$conn->close();
	}
?>