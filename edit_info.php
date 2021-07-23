<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT first_name, last_name, email, phone, parent_name, grade FROM user WHERE user.id = " . $_SESSION["uid"];
$result = $conn->query($sql);

$first_name;
$last_name;
$email;
$phone;
$parent_name;
$grade;
    
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $parent_name = $row["parent_name"];
        $grade = $row["grade"];
    }
}
else {
    echo "No data available";
}

$conn->close();
?>

<p>User Details:</p>

<form class="form-horizontal" action="home.php?col=edit_info_submit" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2">User Type: </label>
        <div class="col-sm-4">
            <select class="form-control" name="utype" id="userType">
                <?php
                    if ($_SESSION["utype"] == 1) {
                        echo "<option value=\"1\">Student</option>";
                    }
                    else if ($_SESSION["utype"] == 2) {
                        echo "<option value=\"2\">Tutor</option>";
                    }
                    else if ($_SESSION["utype"] == 3) {
                        echo "<option value=\"3\">Admin</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">First Name: </label>
        <div class="col-sm-4">
             <input type="text" class="form-control" placeholder="Enter name" name="fname" value="<?php echo $first_name;?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Last Name: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter name" name="lname" value="<?php echo $last_name;?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Email: </label>
        <div class="col-sm-4">
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo $email;?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Grade Level: </label>
        <div class="col-sm-4">
            <select class="form-control" name="grade" id="userGrade">
                <?php
                    if ($_SESSION["utype"] == 1) {
                        echo "<option value='0'>Kindergarten</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>";
                    }
                    else {
                        echo "<option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group" id="userParent">
        <label class="control-label col-sm-2">Parent Name: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter name" name="pname" value="<?php echo $parent_name;?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>

<form class="form-horizontal" action="home.php?col=edit_reset_pwd" method="post">
    <button type="submit" class="btn btn-default">Reset Password</button>
</form>

<script>
$("#userGrade").val(<?php echo $grade ?>);
</script>