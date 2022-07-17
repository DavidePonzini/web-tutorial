<?php
    function redirect($url) {
        header('Location: ' . $url);
        die();
    }

    function execute_query($query, $params = array()) {
        $db_username = 'myuser';
        $db_password = 'password';
        $db_dbname = 'website';

        try {
            $db = new PDO('mysql:host=localhost:3306;dbname=' . $db_dbname, $db_username, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare($query);
            $stmt->execute($params);

            return $stmt;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    // Execute a query and automatically fetch the result
    function execute_query_select($query, $params = array()) {
        return execute_query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    function is_logged_in() {
        return isset($_SESSION['username']);
    }

    function is_admin() {
        return is_logged_in() && $_SESSION['admin'];
    }

    function login($username) {
        $_SESSION['username'] = $username;

        $is_admin = execute_query('SELECT admin FROM users WHERE username = ?', array($username));
        $is_admin = $is_admin->fetchAll();
        $is_admin = $is_admin[0]['admin'];
        $_SESSION['admin'] = $is_admin == '1';
    }
?>