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

        $form_username = $_POST['username'];
        $form_password = $_POST['password'];
        $form_rememberme = isset($_POST['rememberme']);

        $db_password = execute_query_select('SELECT pwd_hash FROM daniwebtutorial_users WHERE username = ?', array($form_username));

        if(count($db_password) != 1) {
            $error = 'Username';
        } else {
            $password_hash = $db_password[0]['pwd_hash'];

            if (password_verify($form_password, $password_hash)) {
                login($form_username);

                if ($form_rememberme)
                    set_cookie('daniwebtutorial_username', $form_username);

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
    <link rel="stylesheet" href="styles/icons.css">
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>

    <div class="container">
        <div class="content-tab">
            <h1>Login</h1>
            <div class="row">
                <div class="col">
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control <?php echo_conditional(isset($error) && $error = 'Username', 'is-invalid', ''); ?>" id="username" name="username" placeholder="user | dav | admin">
                            <div class="invalid-feedback <?php echo_conditional(isset($error) && $error = 'Username', '', 'hidden'); ?>" id="username-error">Invalid username.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?php echo_conditional(isset($error) && $error = 'Password', 'is-invalid', ''); ?>" id="password" name="password" placeholder="pollo">
                            <div class="invalid-feedback <?php echo_conditional(isset($error) && $error = 'Password', '', 'hidden'); ?>" id="password-error">Invalid password.</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme">
                            <label class="form-check-label" for="rememberme">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col center">
                    <i class="bi bi-box-arrow-in-left icon-big icon-gold"></i>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
