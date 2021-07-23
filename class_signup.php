<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT class.id, subject, description, day, time, duration, no_classes, start_date FROM class, schedule, day_type
        WHERE status = 2 AND class.schedule_id = schedule.id AND day_id = day_type.id AND
        (SELECT count(*) FROM signup WHERE student_id = " . $_SESSION["uid"] . " AND class_id = class.id) = 0 AND
        no_students > (SELECT count(*) FROM signup WHERE class_id = class.id AND signup.status != 3)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
            . "<th>Subject</th>"
            . "<th>Other Subjects</th>"
            . "<th>Day</th>"
            . "<th>Time</th>"
            . "<th>Duration</th>"
            . "<th>Classes</th>"
            . "<th>Start Date</th>"
            . "<th>Action</th>"
         . "</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>"
                . "<td>".$row["subject"]."</td>"
                . "<td>".$row["description"]."</td>"
                . "<td>".$row["day"]."</td>"
                . "<td>".$row["time"]."</td>"
                . "<td>".$row["duration"]."</td>"
                . "<td>".$row["no_classes"]."</td>"
                . "<td>".$row["start_date"]."</td>"
                . "<td><a href=\"home.php?col=signup_submit&classid=".$row["id"]."\"><input type=\"button\" value=\"Signup\"></a></td>"
                . "</tr>";
    }
    echo "</table>";
}
else {
    echo "No classes available";
}

$conn->close();
?>