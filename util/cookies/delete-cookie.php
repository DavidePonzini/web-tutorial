<?php
    if(isset($_GET['name']))
        $name = $_GET['name'];
    else
        $name = "test_cookie";

    // set the expiration date to one hour ago
    setcookie($name, "", time() - 60*60, '/');
?>