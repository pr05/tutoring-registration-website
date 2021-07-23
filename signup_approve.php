<?php include 'dbconfig.php'; ?>

<h3>
    Approve Signup
</h3>

<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT signup.id, subject, description, day, time, duration, no_students, first_name, last_name, email FROM class, signup, user, schedule , day_type
        where signup.status = 1 and signup.student_id = user.id and class_id = class.id and class.schedule_id = schedule.id and day_id = day_type.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
    . "<th>Subject</th>"
    . "<th>Description</th>"
    . "<th>Day</th>"
    . "<th>Time</th>"
    . "<th>Duration</th>"
    . "<th>Seats</th>"
    . "<th>Student</th>"
    . "<th>Email</th>"
    . "<th colspan=\"2\">Action</th>"
    . "</tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>"
        . "<td>" . $row["subject"] . "</td>"
        . "<td>" . $row["description"] . "</td>"
        . "<td>" . $row["day"] . "</td>"
        . "<td>" . $row["time"] . "</td>"
        . "<td>" . $row["duration"] . "</td>"
        . "<td><a href=\"home.php?col=student&classid=" . $row["id"] . "\">" . $row["no_students"] . "</a></td>"
        . "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>"
        . "<td>" . $row["email"] . "</td>"
        . "<td><a href=\"home.php?col=signup_approve_submit&status=2&email=" . $row["email"] . "&signupid=" . $row["id"] . "\"><input type=\"button\" value=\"Approve\"></a></td>"
        . "<td><a href=\"home.php?col=signup_approve_submit&status=3&email=" . $row["email"] . "&signupid=" . $row["id"] . "\"><input type=\"button\" value=\"Deny\"></a></td>"
        . "</tr>";
    }
    echo "</table>";
} else {
    echo "No signup pending";
}
$conn->close();
?>