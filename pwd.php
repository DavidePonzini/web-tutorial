<?php
    $pwd = $_GET['pwd'];
    $hash = password_hash($pwd, PASSWORD_DEFAULT);
    
    echo $hash;
?>