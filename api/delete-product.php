<?php
    require('../php/functions.php');
    require('../php/session.php');

    if (!is_admin())
        error_unauthorized();

    if(!isset($_GET['name']))
        error_bad_request();

    $name = $_GET['name'];

    execute_query('DELETE FROM products WHERE name = ?', array($name));
?>