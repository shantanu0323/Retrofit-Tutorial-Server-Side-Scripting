<?php

	require 'init.php';
	$dbname = "retrofit";
	
	$sql = "USE ".$dbname.";";
	mysqli_query($conn, $sql);

	$table= "";
	if($_GET['item_type'] == 'fruits') {
		$table = 'fruits';
	} else if ($_GET['item_type'] == 'vegetables') {
		$table = 'vegetables';
	}
	
	$sql = "SELECT * FROM ".$table.";";
	$response = array();
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_array($result)) {
		array_push($response, array(
			'name' => $row['name'],
			'image_path' => $row['image_path'],
			'calories' => $row['calories']
		));
	}

	echo json_encode($response);

	

?>