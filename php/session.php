<?php
    // Start session, in not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function is_logged_in() {
        return isset($_SESSION['daniwebtutorial_username']);
    }

    function is_admin() {
        return is_logged_in() && $_SESSION['daniwebtutorial_admin'];
    }

    function login(string $username) {
        $_SESSION['daniwebtutorial_username'] = $username;

        $is_admin = execute_query('SELECT admin FROM daniwebtutorial_users WHERE username = ?', array($username));
        $is_admin = $is_admin->fetchAll();
        $is_admin = $is_admin[0]['admin'];
        $_SESSION['daniwebtutorial_admin'] = $is_admin == '1';
    }

    function logout() {
        session_destroy();
    }
?>