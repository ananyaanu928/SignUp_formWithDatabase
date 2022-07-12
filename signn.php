<?php
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];

    $conn = new mysqli('localhost','root','','loginform');
	if($conn->connect_error){
		die("Connection Failed : Unable to connect to the datbase!");
	} 
	else {
		$stmt = $conn->prepare("insert into signup(firstName, lastName, gender, email, password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $firstName, $lastName, $gender, $email, $password);
		$execval = $stmt->execute();
		// echo $execval; used to count the number of passes
		echo "The value registered successfully!";
		$stmt->close();
		$conn->close();
	}
?>