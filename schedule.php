<?php include 'dbconfig.php';?>

<h3>
    Schedule
</h3>

<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT schedule.id, day, time, duration, slots, start_date, no_students, no_classes,
        (SELECT count(*) FROM class WHERE schedule_id = schedule.id) AS signups
        FROM schedule, day_type
        WHERE day_id = day_type.id ORDER BY day_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
            . "<th>Day</th>"
            . "<th>Time</th>"
            . "<th>Duration</th>"
            . "<th>Slots</th>"
            . "<th>Signups</th>"
            . "<th>Start Date</th>"
            . "<th>Students</th>"
            . "<th>Classes</th>"
            . "<th>Action</th>"
         . "</tr>";
    //Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>"
                . "<td>".$row["day"]."</td>"
                . "<td>".$row["time"]."</td>"
                . "<td>".$row["duration"]."</td>"
                . "<td>".$row["slots"]."</td>"
                . "<td><a href=\"home.php?col=class_schedule&schid=".$row["id"]."\">".$row["signups"]."</a></td>"
                . "<td>".$row["start_date"]."</td>"
                . "<td>".$row["no_students"]."</td>"
                . "<td>".$row["no_classes"]."</td>"
                . "<td><a href=\"home.php?col=edit_schedule&id='" . $row["id"]."'\"><input type=\"button\" value=\"Edit\"></a></td>"
                . "</tr>";
    }
    echo "</table>";
}
else {
    echo "No classes available";
}

$conn->close();
?>