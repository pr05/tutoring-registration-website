<?php include 'dbconfig.php';?>

<p>
    Reset password:
</p>

<form class="form-horizontal" name="edit_pwd" action="home.php?col=edit_reset_pwd_submit" method="POST">
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Current Password:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="current_pwd" placeholder="Current password" name="pwdt" value="" />
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
        echo "Invalid temporary password.";
    }
    ?>
</p>