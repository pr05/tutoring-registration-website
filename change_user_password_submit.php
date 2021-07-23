<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$form_new_pwd = $_POST["pwd"];
$hash = password_hash($form_new_pwd, PASSWORD_DEFAULT);
    
//Get user id
$sql1 = "SELECT id FROM user WHERE email='" . $_GET["email"] . "'";
$result1 = $conn->query($sql1);
$uid;
    
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $uid = $row["id"];
    }
}
    
//Update password
$sql = "UPDATE auth SET pwd = '" . $hash . "' where user_id='" . $uid . "'";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
    echo "Password reset successful";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>