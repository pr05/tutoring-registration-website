<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select id, time as name from schedule where day_id = " . $_GET["day"] . " and
        slots > (select count(schedule_id) from class where schedule_id = schedule.id and class.status != 3)";
$result = $conn->query($sql);

class Time {

    public $id;
    public $name;

}

$times = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $time = new Time();
        $time->id = $row["id"];
        $time->name = $row["name"];
        $times[] = $time;
    }
}
echo json_encode($times);
$conn->close();
?>
