<?php
    require('../php/functions.php');
    require('../php/session.php');
    require('../php/files.php');

    if (!is_admin())
        error_unauthorized();

    if(!isset($_POST['name'], $_POST['descr'], $_POST['price'], $_FILES['img']))
        error_bad_request();

    $name = $_POST['name'];
    $descr = $_POST['descr'];
    $price = $_POST['price'];
    
    $img_path = 'res/' . $_FILES['img']['name'];

    // IMPORTANT: check data correctness!

    try {
        execute_query('INSERT INTO daniwebtutorial_products(name, descr, price, img_path) VALUES (?,?,?,?)', array($name, $descr, $price, $img_path));
        upload_file($_FILES['img'], 'res/');
    } catch(Exception $e) {
        print_r($e);
        error_bad_request();
    }

    redirect('../admin.php');

?>