<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Insert schedule item
$sql = "INSERT INTO schedule (day_id, time, duration, slots, start_date, no_students, no_classes )
    VALUES ('" . $_POST["day"] . "', '" . $_POST["time"] . "', '" . $_POST["duration"] . "', '" . $_POST["slots"] . "', '" . $_POST["start"] . "', '" . $_POST["noStudents"] . "', '" . $_POST["noClasses"] . "')";

if ($conn->query($sql) === TRUE) {
    echo "Scheduled created";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>