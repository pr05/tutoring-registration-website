<?php
//One-time-use file to encrypt all existing passwords.
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT pwd, id FROM auth";
$result = $conn->query($sql);

$pwd = "";
$id = 0;
while($row = $result->fetch_assoc()) {
    $pwd = $row["pwd"];
    $id = $row["id"];

    $hash = password_hash($pwd, PASSWORD_DEFAULT);
    $sql3 = "UPDATE auth
            SET pwd = '" . $hash . "'
            WHERE id='" . $id . "'";

    if ($conn->query($sql3) === TRUE) {
        echo "Password reset successful";
        echo "<br>";
    }
    else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
}

$conn->close();
?>