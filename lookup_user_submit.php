<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$email = $_POST["email_search"];
$sql = "SELECT first_name, last_name, phone, parent_name, user_type, grade FROM user WHERE email='" . $email . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"table table-striped\"><tr>"
            . "<th>First Name</th>"
            . "<th>Last Name</th>"
            . "<th>Email</th>"
            . "<th>Phone Number</th>"
            . "<th>Parent Name</th>"
            . "<th>User Type</th>"
            . "<th>Grade</th>"
            . "<th colspan='2'>Action</th>"
         . "</tr>";
    //Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>"
                . "<td>".$row["first_name"]."</td>"
                . "<td>".$row["last_name"]."</td>"
                . "<td>". $email ."</td>"
                . "<td>".$row["phone"]."</td>"
                . "<td>".$row["parent_name"]."</td>"
                . "<td>".$row["user_type"]."</td>"
                . "<td>".$row["grade"]."</td>"
                . "<td><a href=\"home.php?col=change_user_type&email=" . $email . "&user_type=" . $row["user_type"] . "\"><input type=\"button\" value=\"Change User Type\"></a></td>"
                . "<td><a href=\"home.php?col=change_user_password&email=" . $email . "\"><input type=\"button\" value=\"Change User Password\"></a></td>"
                . "</tr>";
    }
    echo "</table>";
}
else {
    echo "No user with that email was found";
}

$conn->close();
?>