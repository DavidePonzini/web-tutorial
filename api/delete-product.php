<?php
    require('../php/functions.php');
    require('../php/session.php');
    require('../php/files.php');

    if (!is_admin())
        error_unauthorized();

    if(!isset($_GET['name']))
        error_bad_request();

    $name = $_GET['name'];
    
    $img_path_db = execute_query_select('SELECT img_path FROM products WHERE name = ?', array($name));
    $img_path = $img_path_db[0]['img_path'];

    execute_query('DELETE FROM products WHERE name = ?', array($name));

    delete_file($img_path);
?>