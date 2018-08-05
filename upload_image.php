<?php

require "init.php";

$sql = "USE retrofit;";
mysqli_query($conn, $sql);  

$title = $_POST['title'];
$image = $_POST['image'];
$upload_path = "uploads/".$title.".jpg";

$sql = "INSERT INTO images (title, path) VALUES ('".$title."','".$upload_path."');";

if(mysqli_query($conn, $sql)) {
	file_put_contents($upload_path, base64_decode($image));
	echo json_encode(array(
		'response' => 'Image uploaded successfully !!!'
	));
} else {
	echo json_encode(array(
		'response' => 'Image upload failed !!!'.mysqli_error($conn)
	));
}

?>