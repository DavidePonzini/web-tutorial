<?php
    require('../php/functions.php');
    require('../php/session.php');
    require('../php/upload.php');

    if (!is_admin())
        error_unauthorized();

    if(!isset($_POST['name'], $_POST['descr'], $_POST['price'], $_FILES['img']))
        error_bad_request();

    $name = $_POST['name'];
    $descr = $_POST['descr'];
    $price = $_POST['price'];
    
    $img_path = 'res/' . $_FILES['img']['name'];

    try {
        execute_query('INSERT INTO products(name, descr, price, img_path) VALUES (?,?,?,?)', array($name, $descr, $price, $img_path));
        upload_file($_FILES['img'], 'web-tutorial/res/');
    } catch(Exception $e) {
        print_r($e);
        error_bad_request();
    }

    redirect('../admin.php');

?>