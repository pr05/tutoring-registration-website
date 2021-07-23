<?php
session_start();
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT auth.pwd, user.id, user.user_type FROM auth, user WHERE user.email = \"" . $_POST["email"] . "\" AND user.id = auth.user_id";
$result = $conn->query($sql);

$pwd = "";
$uid = 0;
$utype = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pwd = $row["pwd"];
        $uid = $row["id"];
        $utype = $row["user_type"];
    }
        
    //Check temporary password
    $form_pwdt = $_POST["pwdt"];
    $verify = password_verify($form_pwdt, $pwd);
    //Previously inside if: $pwd == $_POST["pwdt"]
    
    //Encrypt new password
    $form_new_pwd = $_POST["pwd"];
    $hash = password_hash($form_new_pwd, PASSWORD_DEFAULT);
    if ($verify){
        $sql3 = "UPDATE auth
                INNER JOIN
                (SELECT id, email
                FROM user ) AS user
                ON
                auth.user_id = user.id
                SET auth.pwd = '" . $hash ."'
                WHERE user.email='".$_POST["email"]."'";

        if ($conn->query($sql3) === TRUE) {
            echo "<meta http-equiv=\"refresh\" content=\"0;url=start.php?col=login_form&email=".$_POST["email"]."\">";
        }
        else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
    }
    else {
        echo "<meta http-equiv=\"refresh\" content=\"0;url=start.php?col=reset_form&err=pwd&email=".$_POST["email"]."\">";
    }
}
else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=start.php?col=login_form&email=".$_POST["email"]."\">";
}

$conn->close();
?>