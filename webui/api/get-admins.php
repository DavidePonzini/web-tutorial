<?php
    require('../php/functions.php');
    require('../php/session.php');

    if (!is_admin()) {
        http_response_code(403);    // Not authorized
        die();
    }

    echo json_encode(execute_query_select('SELECT username, admin FROM daniwebtutorial_users ORDER BY username'));
?>