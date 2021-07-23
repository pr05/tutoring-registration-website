<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Insert user
$sql = "INSERT INTO user (first_name, last_name, email, grade, parent_name, user_type)
    VALUES ('" . $_POST["fname"] . "', '" . $_POST["lname"] . "', '" . $_POST["email"] . "', '" . $_POST["grade"] . "', '" . $_POST["pname"] . "', '" . $_POST["utype"] . "')";

$plaintext_password = $_POST["pwd"];
$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);

if ($conn->query($sql) === TRUE) {
    $sql3 = "INSERT INTO auth (user_id, pwd)
        select id, '" . $hash . "' from user where email = \"" . $_POST["email"] . "\"";

    if ($conn->query($sql3) === TRUE) {
        //header("Location: index.php");
        echo "<meta http-equiv=\"refresh\" content=\"0;url=start.php?col=login_form&email=" . $_POST["email"] . "\">";
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>