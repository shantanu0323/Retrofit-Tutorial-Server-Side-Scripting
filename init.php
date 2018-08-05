<?php
	
	$server = "localhost";
	$username = "shantanu0323";
	$password = "shaandb@0323";
	
	$conn = mysqli_connect($server, $username, $password);
	
	if ($conn == null) {
		die("Connection to server cannot be established");
	}

?>