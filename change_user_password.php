<?php
include 'dbconfig.php';

echo "
<p>
    Reset password:
</p>

<form class=\"form-horizontal\" name=\"edit_pwd\" action=\"home.php?col=change_user_password_submit&email=" . $_GET["email"] . "\" method=\"POST\">
    <div class=\"form-group\">
        <label class=\"control-label col-sm-2\" for=\"pwd\">New Password:</label>
        <div class=\"col-sm-4\">
            <input type=\"password\" class=\"form-control\" id=\"admin_pwd_reset\" placeholder=\"Enter password\" name=\"pwd\" value=\"\" />
        </div>
    </div>
    <div class=\"form-group\">
        <div class=\"col-sm-offset-2 col-sm-4\">
          <button type=\"submit\" class=\"btn btn-default\">Submit</button>
        </div>
    </div>
</form>
";
?>