<?php
	// connect to MySQL
	$conn= mysqli_connect("localhost", "root", "peace", "shoutit"); // hostname, sql(database) user, sql user password, database name
	
	// test connection
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
