<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Insert signup
$sql = "INSERT INTO signup (class_id, student_id, status)
VALUES ('" . $_GET["classid"] . "'," . $_SESSION["uid"] . ", 1)";

if ($conn->query($sql) === TRUE) {
    echo "Signup completed";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>