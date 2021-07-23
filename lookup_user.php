<?php include 'dbconfig.php';?>

<p>
    Search for user by email:
</p>

<form class="form-horizontal" name="email_search" action="home.php?col=lookup_user_submit" method="POST">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">User's email:</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email_lookup" placeholder="Enter email" name="email_search"/>
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