<?php include 'dbconfig.php';?>

<form class="form-horizontal" action="home.php?col=class_submit" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2">Subject: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter up to 2 subjects" name="subject" required>
            <p>Format: e.g. Science, Math</p>
            <p>Please see our website for approved subjects. If the subjects you enter are not approved your slot will not be accepted.</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Other Subjects: </label>
        <div class="col-sm-4">
            <textarea rows="3" class="form-control" placeholder="Enter additional subjects" name="desc" ></textarea>
            <p>Use this area to enter any subjects you can comfortably tutor in aside from your main two subject areas. Follow the same format as above.</p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Day: </label>
        <div class="col-sm-4">
            <select class="form-control" name="day" id="classDay" required>
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
            <select class="form-control" name="time" id="classTime" required>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>
