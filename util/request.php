<?php
    echo 'Request method: ' . $_SERVER['REQUEST_METHOD'] . '

    <br><br>
    
    ';

    if($_SERVER['REQUEST_METHOD'] == 'GET')
        print_r($_GET);
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        print_r($_POST);

    echo '

    <br><br>
    
    ';

    echo 'Usage (POST): curl -d "a=1&b=2" <url>
    ';
?>