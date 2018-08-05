<?php

	require "init.php";
	
	$dbname = "retrofit";
	$table = "contacts";
	
	$sql = "USE ".$dbname.";";
	mysqli_query($conn, $sql);
	
	$sql = "SELECT * FROM ".$table.";";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		echo "Error: ".mysqli_error($conn);
		exit();
	}	
	$response = array();
	
	while($row = mysqli_fetch_array($result)) {
		array_push($response, array(
			'name' => $row['name'],
			'email' => $row['email']
		));
	}
	
	echo json_encode($response);
	
	mysqli_close($conn);

?>