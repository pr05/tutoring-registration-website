<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE class set status = " .$_GET["status"] ." where id = " .$_GET["classid"];

if ($conn->query($sql) === TRUE) {
    $msg = "Your class registration is confirmed. Please login to view classes.";
    $msg = wordwrap($msg,70);
    mail($_GET["email"],"Peer Tutor",$msg);
    //header("Location: home.php?col=class_approve");
    echo "<meta http-equiv=\"refresh\" content=\"0;url=home.php?col=class_approve\">";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>