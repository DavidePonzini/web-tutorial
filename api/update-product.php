<?php
    require('../php/functions.php');
    require('../php/session.php');

    if (!is_admin())
        error_unauthorized();

    if(!isset($_GET['name'], , $_GET['descr'], $_GET['price']))
        error_bad_request();

    $name = $_GET['name'];
    $descr = $_GET['descr'];
    $price = $_GET['price'];

    execute_query('UPDATE products SET descr = ?, price = ? WHERE name = ?', array($descr, $price, $name));
?>