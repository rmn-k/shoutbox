<?php
include 'database.php'; // it only has the $conn stuff. 

// form submitted using POST method ki input fields are accessed using corresponding "name" attributes	

//Check if form submitted
if(isset($_POST['submit'])){   // checks if the submit button was pushed
	$user = mysqli_real_escape_string($conn, $_POST['user']); // checks if the submit button was pushed
	$message = mysqli_real_escape_string($conn, $_POST['message']);
	
	//Set timezone
	date_default_timezone_set('Asia/Kolkata');
	$time = date('h:i:s',time()); // one of formatting styles for time. h:i:s a was giving error while storing
	
	//Validate input
	if(!isset($user) || $user == '' || !isset($message) || $message == ''){
		$error = "Please fill in your name and a message";
		header("Location: index.php?error=".urlencode($error));
		exit();
	} else {
		$query = "INSERT INTO shouts (user, message, time)
				VALUES ('$user','$message','$time')";
		
		if(!mysqli_query($conn, $query)){
			die('Error: '.mysqli_error($conn));
		} else {
			header("Location: index.php");
			exit();
		}
	}
}
