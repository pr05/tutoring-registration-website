<?php
session_start();
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Check email
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
    
    $form_pwd = $_POST["pwd"];
    $verify = password_verify($form_pwd, $pwd);
    if ($verify){
        $_SESSION["uid"] = $uid;
        $_SESSION["utype"] = $utype;

        //header("Location: home.php?col=class");
        echo "<meta http-equiv=\"refresh\" content=\"0;url=home.php?col=class\">";
    }
    else {
        //header("Location: index.php?email=".$_POST["email"]);
        echo "<meta http-equiv=\"refresh\" content=\"0;url=start.php?col=login_form&err=pwd&email=".$_POST["email"]."\">";
    }
}
else {
    //email not found
    echo "<meta http-equiv=\"refresh\" content=\"0;url=start.php?col=login_form&email=".$_POST["email"]."\">";
}


$conn->close();
?>