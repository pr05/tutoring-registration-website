<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$user_type = $_GET["user_type"];
    
if ($user_type == 1)
    $user_type = 2;
else if ($user_type == 2)
    $user_type = 1;
    
$sql = "UPDATE user SET user_type=" . $user_type . " WHERE email = '" . $_GET["email"] . "'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>