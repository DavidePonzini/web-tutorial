<?php
    if(!isset($_GET['pwd'])) {
        echo 'Please specify GET parameter `pwd`.';
        die();
    }

    echo password_hash($_GET['pwd'], PASSWORD_DEFAULT);
?>