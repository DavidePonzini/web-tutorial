<?php
    function redirect(string $url) {
        header('Location: ' . $url);
        die();
    }

    function execute_query(string $query, array $params = array()) {
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
    function execute_query_select(string $query, array $params = array()) {
        return execute_query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    function set_cookie(string $name, string $value) {
        $duration = 60*60*24*30; // thirthy days

        setcookie($name, $value, $duration, '/');
    }

    function echo_conditional(bool $condition, string $value_if_true, string $value_if_false) {
        if($condition)
            echo $value_if_true;
        else
            echo $value_if_false;
    }
?>