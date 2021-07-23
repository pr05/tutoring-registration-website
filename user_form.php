<p>
    User Details:
</p>

<form class="form-horizontal" action="user_submit.php" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2">User Type: </label>
        <div class="col-sm-4">
            <select class="form-control" name="utype" id="userType">
                <option value="1">Student</option>
                <option value="2">Tutor</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">First Name: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter name" name="fname" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Last Name: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter name" name="lname" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Email: </label>
        <div class="col-sm-4">
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php if (array_key_exists("email", $_GET)) {
    echo $_GET["email"];
} ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Grade Level: </label>
        <div class="col-sm-4">
            <select class="form-control" name="grade" id="userGrade">
                <option value="0">Kindergarten</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
    </div>
    <div class="form-group" id="userParent">
        <label class="control-label col-sm-2">Parent Name: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter name" name="pname">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Set Password: </label>
        <div class="col-sm-4">
            <input type="password" class="form-control" placeholder="Enter password" name="pwd" value="" required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>
<!--<p>If you have any questions or concerns feel free to contact us at pboropeertutoring@gmail.com</p>-->