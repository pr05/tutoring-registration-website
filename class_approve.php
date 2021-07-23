<?php include 'dbconfig.php';?>

<h3>
    Approve Class
</h3>

<?php

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT class.id, subject, description, day, time, duration, slots, no_students, first_name, last_name, email, grade, schedule.id AS schid FROM class, schedule, user, day_type
        WHERE class.status = 1 AND class.schedule_id = schedule.id AND class.tutor_id = user.id AND day_id = day_type.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
            . "<th>Subject</th>"
            . "<th>Description</th>"
            . "<th>Day</th>"
            . "<th>Time</th>"
            . "<th>Duration</th>"
            . "<th>Slots</th>"
            . "<th>Students</th>"
            . "<th>Tutor</th>"
            . "<th>Email</th>"
            . "<th>Grade</th>"
            . "<th colspan=\"2\">Action</th>"
         . "</tr>";
    //Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>"
                . "<td>".$row["subject"]."</td>"
                . "<td>".$row["description"]."</td>"
                . "<td>".$row["day"]."</td>"
                . "<td>".$row["time"]."</td>"
                . "<td>".$row["duration"]."</td>"
                . "<td><a href=\"home.php?col=class_schedule&schid=".$row["schid"]."\">".$row["slots"]."</a></td>"
                . "<td>".$row["no_students"]."</td>"
                . "<td>".$row["first_name"]." ".$row["last_name"]."</td>"
                . "<td>".$row["email"]."</td>"
                . "<td>".$row["grade"]."</td>"
                . "<td><a href=\"home.php?col=class_approve_submit&status=2&email=".$row["email"]."&classid=".$row["id"]."\"><input type=\"button\" value=\"Approve\"></a></td>"
                . "<td><a href=\"home.php?col=class_approve_submit&status=3&email=".$row["email"]."&classid=".$row["id"]."\"><input type=\"button\" value=\"Deny\"></a></td>"
                . "</tr>";
    }
    echo "</table>";
}
else {
    echo "No classes pending";
}

$conn->close();
?>