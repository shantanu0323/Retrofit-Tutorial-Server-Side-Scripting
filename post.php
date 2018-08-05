<?php

$input = @file_get_contents("php://input"); 
$incoming = json_decode($input); 

$servername = "localhost";
$username = "shantanu0323";
$password = "shaandb@0323";
$database = "retrofit";
$table = "user";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully<br><br>";

$sql = "INSERT INTO ".$table." (name, email, topics, age)
        VALUES ('".$incoming->name."', '".$incoming->email."', '".$incoming->topics."', '".$incoming->age."');";

if (mysqli_query($conn, $sql)) {
    //echo "<br>New record created successfully";
    $sql = "SELECT id FROM ".$table." WHERE name='".$incoming->name."' AND email='".$incoming->email."' AND topics='".$incoming->topics."' AND age='".$incoming->age."';";
    $result = mysqli_query($conn, $sql);
    $allottedId = 0;
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $allottedId = $row["id"];
            //echo "id: " . $row["id"]. "<br>";
        }
    } else {
        //echo "0 results";
    }
    $incoming->id = $allottedId;
    $resp = json_encode($incoming);
    echo $resp;
} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>