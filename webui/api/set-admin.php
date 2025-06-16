<?php
    require('../php/functions.php');
    require('../php/session.php');

    if (!is_admin())
        error_unauthorized();

    if(!isset($_GET['username'], $_GET['value']))
        error_bad_request();

    $username = $_GET['username'];
    $admin = $_GET['value'];

    execute_query('UPDATE daniwebtutorial_users SET admin = ? WHERE username = ?', array($admin, $username));
?>