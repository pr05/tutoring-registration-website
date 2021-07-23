<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Update schedule slot
$sql = "UPDATE schedule SET day_id='" . $_POST["day"] ."', time='".$_POST["time"]."', duration='". $_POST["duration"].
        "', slots=".$_POST["slots"].", start_date='".$_POST["start"]."', no_students='" . $_POST["noStudents"]. 
        "', no_classes='" . $_POST["noClasses"] . "' WHERE schedule.id=" . $_GET["id"];
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>