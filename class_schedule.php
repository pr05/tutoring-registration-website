<?php include 'dbconfig.php';?>

<h3>
    Schedule Classes
</h3>

<?php

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT class.id, subject, description, day, time, duration, no_students, first_name, last_name, email, grade, status.type,
        (SELECT count(*) FROM signup WHERE signup.class_id = class.id) AS signups
        FROM class, schedule, status, day_type, user
        WHERE class.schedule_id = schedule.id AND schedule_id = " . $_GET["schid"] . " AND class.status = status.id AND day_id = day_type.id AND class.tutor_id = user.id ORDER BY day_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
            . "<th>Subject</th>"
            . "<th>Other Subjects</th>"
            . "<th>Day</th>"
            . "<th>Time</th>"
            . "<th>Duration</th>"
            . "<th>Students</th>"
            . "<th>Signups</th>"
            . "<th>Tutor</th>"
            . "<th>Email</th>"
            . "<th>Grade</th>"
            . "<th>Status</th>"
         . "</tr>";
    
    //Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>"
                . "<td>".$row["subject"]."</td>"
                . "<td>".$row["description"]."</td>"
                . "<td>".$row["day"]."</td>"
                . "<td>".$row["time"]."</td>"
                . "<td>".$row["duration"]."</td>"
                . "<td>".$row["no_students"]."</td>"
                . "<td><a href=\"home.php?col=student&classid=".$row["id"]."\">".$row["signups"]."</a></td>"
                . "<td>".$row["first_name"]." ".$row["last_name"]."</td>"
                . "<td>".$row["email"]."</td>"
                . "<td>".$row["grade"]."</td>"
                . "<td>".$row["type"]."</td>"
                . "</tr>";
    }
    echo "</table>";
}
else {
    echo "No classes available";
}

$conn->close();
?>