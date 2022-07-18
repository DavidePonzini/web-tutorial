<?php
    require('php/session.php');
    require('php/functions.php');

    if(is_logged_in())
        redirect('index.php');

    if(isset($_COOKIE['username'])) {
        login($_COOKIE['username']);
        redirect('index.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!isset($_POST['username'], $_POST['password']))
            die('Invalid request');

        $my_username = $_POST['username'];
        $my_password = $_POST['password'];
        $rememberme = isset($_POST['rememberme']);

        $db_password = execute_query('SELECT pwd_hash FROM users WHERE username = ?', array($my_username));

        if(count($db_password) != 1) {
            $error = 'Username';
        } else {
            $password_hash = $db_password[0]['pwd_hash'];

            if (password_verify($my_password, $password_hash)) {
                login($my_username);

                if ($rememberme)
                    set_cookie('username', $my_username);

                redirect('index.php');
            } else {
                $error = 'Password';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

    <!-- Custom -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/social.css">
    <link rel="stylesheet" href="styles/icons.css">
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>

    <div class="container">
        <div class="content-tab">
            <h1>Login</h1>
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>