<p>
    Login:
</p>

<form class="form-horizontal" name="login" action="login_submit.php" method="POST">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">User Id:</label>
        <div class="col-sm-4">
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(array_key_exists("email", $_GET)){echo $_GET["email"];} ?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="email" placeholder="Enter password" name="pwd" value="" />
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
        echo "Invalid login. ";
        if (array_key_exists("email", $_GET)){
            echo "<a href=\"start.php?col=reset_form&email=".$_GET["email"]."\">Reset</a> password";
        }
    }
    ?>
</p>
<p> Click <a href="start.php?col=user_form">here</a> to register. </p>

