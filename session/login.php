<?php
    session_start();

    $username = $_GET['username'];

    $_SESSION['username'] = $username;
    
    echo 'Username set to "' . $username . '"';
?>