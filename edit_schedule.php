<?php
include 'dbconfig.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$sql = "SELECT day_id, time, duration, slots, start_date, no_students, no_classes FROM schedule WHERE id = " . $_GET["id"];
$result = $conn->query($sql);

$day_id;
$time;
$duration;
$slots;
$start_date;
$no_students;
$no_classes;
    
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $day_id = $row["day_id"];
        $time = $row["time"];
        $duration = $row["duration"];
        $slots = $row["slots"];
        $start_date = $row["start_date"];
        $no_students = $row["no_students"];
        $no_classes = $row["no_classes"];
    }
}
else {
    echo "No data available";
}

$conn->close();
?>

<p>Schedule Slot Details:</p>

<form class="form-horizontal" action="home.php?col=edit_schedule_submit&id=<?php echo $_GET["id"];?>" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2">Day: </label>
        <div class="col-sm-4">
            <select class="form-control" name="day" >
                <?php
                    $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                    foreach ($days as $key => $value) {
                        if ($key + 1 == $day_id)
                            echo "<option selected='selected' value='" . $day_id . "'>" . $value . "</option>";
                        else
                            echo "<option value='" . ($key + 1) . "'>" . $value . "</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Time: </label>
        <div class="col-sm-4">
            <input type="time" class="form-control" placeholder="Enter time" name="time" value="<?php echo $time;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Duration: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter mins" name="duration" value="<?php echo $duration;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Slots: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter slots" name="slots" value="<?php echo $slots;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Start Date: </label>
        <div class="col-sm-4">
            <input type="date" class="form-control" placeholder="Enter date" name="start" value="<?php echo $start_date;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Number of Students: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter count" name="noStudents" value="<?php echo $no_students;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Number of Classes: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter count" name="noClasses" value="<?php echo $no_classes;?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>