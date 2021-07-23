<?php include 'dbconfig.php'; ?>

<h3>
    Class Students
</h3>

<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT first_name, last_name, email, grade, parent_name, status.type, signup.id, signup.status FROM user, signup, status
            WHERE signup.class_id = " . $_GET["classid"] . " AND signup.student_id = user.id AND signup.status = status.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
    . "<th>Student</th>"
    . "<th>Email</th>"
    . "<th>Grade</th>"
    . "<th>Parent</th>"
    . "<th>Status</th>"
    . "</tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $str = "";
        if ($_SESSION["utype"] == 3) {
            $str = "<td><a href=\"home.php?col=change_student_status&id='" . $row["id"] . "'&status=" . $row["status"] . "\"><input type=\"button\" value=\"Change Status\"></a></td>";
        }
        echo "<tr>"
        . "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>"
        . "<td>" . $row["email"] . "</td>"
        . "<td>" . $row["grade"] . "</td>"
        . "<td>" . $row["parent_name"] . "</td>"
        . "<td>" . $row["type"] . "</td>"
        . $str
        . "</tr>";
    }
    echo "</table>";
} else {
    echo "No students available";
}
$conn->close();
?>