<?php
    require('php/session.php');
    require('php/functions.php');

    if(is_logged_in())
        redirect('index.php');

    function validate_form_data($username, $password, $password_confirm, $email, $firstname, $lastname, $birthdate) {
        // Username: at least 6 characters, only lowercase letters and underscores are allowed.
        //   It must begin and end with letters and cannot contain two consecutive undescores.
        if (!preg_match('/^(?!.*?__)[a-z][a-z_]{4,}[a-z]$/', $username))
            die('Invalid username');

        // Password: at least 8 characters, containing at least one upper case, one lower case, one number and one symbol
        if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password))
            die('Invalid password');

        // Password confirm: must match Password
        if ($password_confirm != $password)
            die('Invalid password confirm');

        // Email: standard regex available from the web
        if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email))
            die('Invalid email');
        
        // First name: must begin with upper case letter, followed by zero or more letters or spaces. Nothing else allowed
        if (!preg_match('/^[A-Z][A-Za-z ]*$/', $firstname))
            die('Invalid first name');

        // Last name: must begin with upper case letter, followed by zero or more letters or spaces. Nothing else allowed
        if (!preg_match('/^[A-Z][A-Za-z ]*$/', $lastname))
            die('Invalid last name');

        // Birthdate: must be a valid date and user must be at least 18 years old
        try {
            $date = new DateTime($birthdate);

            if (datediff_years($date) < 18)
                die('User must be at least 18 years old');
        } catch (Exception $e) {
            die('Invalid date');
        }
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if all required fields have been supplied
        if(!isset($_POST['username'], $_POST['password'], $_POST['password2'], $_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'])) {
            die('Invalid request: ' . print_r($_POST, true));
        }

        $form_username = $_POST['username'];
        $form_password = $_POST['password'];
        $form_password_confirm = $_POST['password2'];
        
        $form_email = $_POST['email'];

        $form_firstname = $_POST['firstname'];
        $form_lastname = $_POST['lastname'];
        $form_birthdate = $_POST['birthdate'];

        $form_accept_eula = isset($_POST['eula']);
        $form_subscribe_newsletter = isset($_POST['newsletter']);

        // Check for EULA acceptance
        if (!$form_accept_eula)
            die('Must accept EULA');
        // Validate all input fields
        validate_form_data($form_username, $form_password, $form_password_confirm, $form_email, $form_firstname, $form_lastname, $form_birthdate);

        // Check if username is available (not yet registered)
        $db_user_count = execute_query_select('SELECT username FROM daniwebtutorial_users WHERE username = ?', array($form_username));
        $db_user_count = count($db_user_count);

        if ($db_user_count > 0) {
            $error = 'User already registered';
        } else {
            // Convert bool to int
            $newsletter = $form_subscribe_newsletter ? 1 : 0;

            $pwd_hash = password_hash($form_password, PASSWORD_DEFAULT);

            execute_query('INSERT INTO daniwebtutorial_users(username, email, firstname, lastname, birthdate, pwd_hash, newsletter) VALUES(?,?,?,?,?,?,?)',
                array($form_username, $form_email, $form_firstname, $form_lastname, $form_birthdate, $pwd_hash, $newsletter));

            redirect('login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

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
            <h1>Registration</h1>
            <div class="row">
                <div class="col">
                    <?php
                        if (isset($error) && $error == 'User already registered')
                            echo '<div class="alert alert-danger d-flex center" role="alert">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <div>Username already taken, please choose a different one.</div>
                                  </div>';
                    ?>
                    <form action="registration.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="davide_ponzini" oninput="check_username()">
                            <div class="invalid-feedback hidden" id="username-error-first-last-lowercase">Username must begin and end with a lowercase letter.</div>
                            <div class="invalid-feedback hidden" id="username-error-two-underscores">Username cannot contain two consecutive undescores.</div>
                            <div class="invalid-feedback hidden" id="username-error-invalid-characters">Username can only contain lowercase letters and underscores.</div>
                            <div class="invalid-feedback hidden" id="username-error-length">Username must be at least 6 characters long.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" oninput="check_password()">
                            <div class="invalid-feedback hidden" id="password-error-lowercase">Password must contain at least one lowercase letter.</div>
                            <div class="invalid-feedback hidden" id="password-error-uppercase">Password must contain at least one uppercase letter.</div>
                            <div class="invalid-feedback hidden" id="password-error-number">Password must contain at least one number.</div>
                            <div class="invalid-feedback hidden" id="password-error-symbol">Password must contain at least one symbol between #?!@$%^&*-</div>
                            <div class="invalid-feedback hidden" id="password-error-length">Password must be at least 8 characters long.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Password confirm</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Please, type your password again" oninput="check_password2()">
                            <div class="invalid-feedback hidden" id="password2-error">Passwords do not match.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="davide.ponzini95@gmail.com" oninput="check_email()">
                            <div class="invalid-feedback hidden" id="email-error">Invalid email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Davide" oninput="check_firstname()">
                            <div class="invalid-feedback hidden" id="firstname-error-uppercase">Name must begin with an uppercase character.</div>
                            <div class="invalid-feedback hidden" id="firstname-error-invalid-characters">Name can only contain letters and spaces.</div>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ponzini" oninput="check_lastname()">
                            <div class="invalid-feedback hidden" id="lastname-error-uppercase">Name must begin with an uppercase character.</div>
                            <div class="invalid-feedback hidden" id="lastname-error-invalid-characters">Name can only contain letters and spaces.</div>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Birth date</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Ponzini" onchange="check_birthdate()">
                            <div class="invalid-feedback hidden" id="birthdate-error-age">You must be at least 18 years old. <i class="small">Please, lie about your age.</i></div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="eula" name="eula" onchange="check_eula()">
                            <label class="form-check-label" for="eula">I have read the EULA agreement and I accept whatever has been written in it.</label>
                            <div class="invalid-feedback hidden" id="eula-error">You must accept the End User Licence Agreement.</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
                            <label class="form-check-label" for="newsletter">I want to be spammed with updates, newsletter and whatnot.</label>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary" disabled>Submit</button>
                    </form>
                </div>
                <div class="col center">
                    <i class="bi bi-person-circle icon-big icon-gold"></i>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Custom -->
    <script src="scripts/registration.js"></script>
</body>
</html>