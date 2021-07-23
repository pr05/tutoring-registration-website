<?php include 'dbconfig.php';?>

<h3>
    My Classes
</h3>

<?php
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT class.id, subject, description, day, time, duration, no_classes, start_date, first_name, last_name, email, status.type FROM class, schedule, status, signup, user, day_type "
        . "WHERE class.schedule_id = schedule.id AND signup.status = status.id AND day_id = day_type.id AND class_id = class.id AND class.tutor_id = user.id AND signup.student_id = " . $_SESSION["uid"];
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
            . "<th>Tutor</th>"
            . "<th>Email</th>"
            . "<th>Status</th>"
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
                . "<td>".$row["first_name"]." ".$row["last_name"]."</td>"
                . "<td>".$row["email"]."</td>"
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