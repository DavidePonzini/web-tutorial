<?php
    if(isset($_GET['name']))
        $name = $_GET['name'];
    else
        $name = "test_cookie";

    if(isset($_GET['value']))
        $value = $_GET['value'];
    else
        $value = "123";

    setcookie($name, $value, time() + (60*60*24 * 30), "/");

    echo 'Cookie ' . $name . ' = ' . $value;
?>