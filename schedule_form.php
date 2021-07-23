<?php include 'dbconfig.php';?>

<form class="form-horizontal" action="home.php?col=schedule_submit" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2">Day: </label>
        <div class="col-sm-4">
            <select class="form-control" name="day" >
                <option value="1">Sunday</option>
                <option value="2">Monday</option>
                <option value="3">Tuesday</option>
                <option value="4">Wednesday</option>
                <option value="5">Thursday</option>
                <option value="6">Friday</option>
                <option value="7">Saturday</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Time: </label>
        <div class="col-sm-4">
            <input type="time" class="form-control" placeholder="Enter time" name="time">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Duration: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter mins" name="duration">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Slots: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter slots" name="slots">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Start Date: </label>
        <div class="col-sm-4">
            <input type="date" class="form-control" placeholder="Enter date" name="start">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Number of Students: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter count" name="noStudents">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Number of Classes: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter count" name="noClasses">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>