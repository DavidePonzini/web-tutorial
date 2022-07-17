<?php
    require_once('./functions.php');

    echo json_encode(execute_query_select('SELECT * FROM products'));   
?>