<?php

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

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$topics = $_REQUEST['topics'];
$age = $_REQUEST['age'];

//echo $name."\n".$email."\n".$topics."\n".$age; 

$sql = "INSERT INTO ".$table." (name, email, topics, age)
        VALUES ('".$name."', '".$email."', '".$topics."', '".$age."');";

if (mysqli_query($conn, $sql)) {
    //echo "<br>New record created successfully";
    $sql = "SELECT id FROM ".$table." WHERE name='".$name."' AND email='".$email."' AND topics='".$topics."' AND age='".$age."';";
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
    if (!isset($response)) 
        $response = new stdClass();
    $response->name = $name;
    $response->email = $email;
    $response->topics = explode(",",$topics);
    $response->age = $age;
    $response->id = $allottedId;
    $JSONResponse = json_encode($response);
    echo $JSONResponse;
} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>