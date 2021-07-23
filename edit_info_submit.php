<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Update user information
$sql = "UPDATE user SET first_name='" . $_POST["fname"] ."', last_name='".$_POST["lname"]."', email='". $_POST["email"].
        "', grade=".$_POST["grade"].", parent_name='".$_POST["pname"]."' WHERE user.id=" . $_SESSION["uid"];
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
}
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>