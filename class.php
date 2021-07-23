<?php
$page = "home_admin";
if ($_SESSION["utype"] == 1){
    $page = "home_student";
}
else if ($_SESSION["utype"] == 2){
    $page = "home_tutor";
}

include $page.".php";
?>
