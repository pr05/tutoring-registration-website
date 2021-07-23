<?php
include 'dbconfig.php';

$pwdt = rand(1000000, 10000000);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$plaintext_password = $pwdt;
$hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
    
$sql3 = "UPDATE auth
        INNER JOIN
        (SELECT id, email
        FROM user ) as user
        ON
        auth.user_id = user.id
        SET auth.pwd = '" .$hash ."'
        where user.email='".$_GET["email"]."'";

if ($conn->query($sql3) === TRUE) {
    //echo $plaintext_password; //For testing purposes
    $msg = "Temporary password: " . $pwdt;
    $msg = wordwrap($msg,70);
    mail($_GET["email"],"Peer Tutor",$msg);
}
else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}

$conn->close();
?>

<p>
    Reset password:
</p>

<form class="form-horizontal" name="login" action="reset_submit.php" method="POST">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">User Id:</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(array_key_exists("email", $_GET)){echo $_GET["email"];} ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Temporary Password:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="temp_pwd" placeholder="Check email" name="pwdt" value="" />
        </div>
        <div class="col-sm-2">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">New Password:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="new_pwd" placeholder="Enter password" name="pwd" value="" />
        </div>
        <div class="col-sm-2">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>
<br>
<p>
    <?php
    if (array_key_exists("err", $_GET)){
        echo "Invalid temporary password. ";
    }
    ?>
</p>
