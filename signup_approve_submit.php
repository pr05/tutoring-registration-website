<?php

include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE signup set status = " . $_GET["status"] . " where id = " . $_GET["signupid"];

if ($conn->query($sql) === TRUE) {
    if ($_GET["status"] == 2) {
        $sql1 = "SELECT email FROM user, signup, class where signup.id = " . $_GET["signupid"] . " and "
                . "signup.class_id = class.id and class.tutor_id = user.id";
        $result = $conn->query($sql1);
        $mail;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $msg = "A student has been approved for your class.";
            $msg = wordwrap($msg, 70);
            echo $row["email"];
            mail($row["email"], "Peer Tutor", $msg);
        }
    }
    echo "<meta http-equiv=\"refresh\" content=\"0;url=home.php?col=signup_approve\">";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>