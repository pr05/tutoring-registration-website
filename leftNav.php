<div class="list-group">
    <?php
        if ($_SESSION["utype"] == 1){
            echo "<a class=\"list-group-item\" href=\"home.php?col=class\">My Classes</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=class_signup\">Signup Class</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=edit_info\">Account Information</a>";
        }
        if ($_SESSION["utype"] == 2){
            echo "<a class=\"list-group-item\" href=\"home.php?col=class\">My Classes</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=class_form\">Schedule Class</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=edit_info\">Account Information</a>";
        }
        if ($_SESSION["utype"] == 3){
            echo "<a class=\"list-group-item\" href=\"home.php?col=class\">All Classes</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=schedule_form\">Create Schedule</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=class_approve\">Approve Class</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=signup_approve\">Approve Signup</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=schedule\">Schedule</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=admin\">Admin Controls</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=lookup_user\">Lookup User</a>";
            echo "<a class=\"list-group-item\" href=\"home.php?col=edit_info\">Account Information</a>";
        }
    ?>
    <a class="list-group-item" href="logout.php">Logout</a>
</div>
