<?php
    function upload_file($file, $dir) {        
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $dir . '/' . basename($file['name']);

        move_uploaded_file($file['tmp_name'], $upload_path);
    }
?>