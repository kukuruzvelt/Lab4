<?php
if($_REQUEST["email"]&&$_REQUEST["pass"]) {
    echo $_REQUEST["email"];
    echo "\n";
    echo $_REQUEST["pass"];
}
else {
    header("Location: http://localhost:63342/Lab4/login.php");
    exit;
}

