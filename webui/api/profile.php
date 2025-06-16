<?php
    require('../php/functions.php');
    require('../php/session.php');

    if (!is_logged_in()) {
        http_response_code(403);    // Not authorized
        die();
    }

    echo json_encode(execute_query_select('SELECT * FROM daniwebtutorial_users WHERE username = ?', array($_SESSION['daniwebtutorial_username'])));
?>