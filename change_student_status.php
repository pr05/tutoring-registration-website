<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$status = $_GET["status"];
$status_no;

switch ($status) {
    case '2':
        $status_no = 3;
        break;
        
    case '3':
        $status_no = 2;
        break;
        
    default:
        $status_no = 1;
}
    
$sql = "UPDATE signup SET status=" . $status_no . " WHERE id =" . $_GET["id"];
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>