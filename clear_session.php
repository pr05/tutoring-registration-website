<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Clear schedule data
$sql = "DELETE FROM schedule";

if ($conn->query($sql) === TRUE) {
    echo "Schedule data cleared<br>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
//Clear signup data
$sql1 = "DELETE FROM signup";

if ($conn->query($sql1) === TRUE) {
    echo "Signup data cleared<br>";
}
else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
    
//Clear class data
$sql2 = "DELETE FROM class";

if ($conn->query($sql2) === TRUE) {
    echo "Class data cleared";
}
else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();
?>