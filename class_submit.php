<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Insert class into database
$sql = "INSERT INTO class (tutor_id, subject, description, schedule_id, status)
VALUES ('" . $_SESSION["uid"] . "', '" . $_POST["subject"] . "', '" . $_POST["desc"] . "', '" .$_POST["time"] ."', 1)";

if ($conn->query($sql) === TRUE) {
    echo "Class scheduled";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>