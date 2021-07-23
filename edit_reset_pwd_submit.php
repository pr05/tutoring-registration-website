<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uid = $_SESSION["uid"];
$sql = "SELECT pwd, id FROM auth WHERE user_id=" . $uid;
$result = $conn->query($sql);

$pwd = "";
$id = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pwd = $row["pwd"];
        $id = $row["id"];
    }
        
    //Check temporary password
    $form_pwdt = $_POST["pwdt"];
    $verify = password_verify($form_pwdt, $pwd);

    //Encrypt new password
    $form_new_pwd = $_POST["pwd"];
    $hash = password_hash($form_new_pwd, PASSWORD_DEFAULT);
    
    if ($verify){
        $sql3 = "UPDATE auth
            SET pwd = '" . $hash . "'
            WHERE id='" . $id . "'";

        if ($conn->query($sql3) === TRUE) {
            echo "Password reset successful";
        }
        else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
    }
    else {
        echo "Incorrect current password";
    }
}
else {
    echo "No data available";
}

$conn->close();
?>