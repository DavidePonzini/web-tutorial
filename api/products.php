<?php
    require_once('../php/functions.php');

    echo json_encode(execute_query_select('SELECT * FROM products'));   
?>