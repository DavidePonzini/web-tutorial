<?php
    require_once('php/functions.php');
    require_once('php/session.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">DavidePonzini</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link <?php echo_conditional(str_ends_with($_SERVER['PHP_SELF'], '/index.php') or str_ends_with($_SERVER['PHP_SELF'], '/'), "active", ""); ?>" href="index.php">Home</a>
                <a class="nav-link <?php echo_conditional(str_ends_with($_SERVER['PHP_SELF'], '/store.php'), "active", ""); ?>" href="store.php">Store</a>
                <a class="nav-link <?php echo_conditional(str_ends_with($_SERVER['PHP_SELF'], '/login.php'), "active", ""); ?> <?php echo_conditional(is_logged_in(), "hidden", ""); ?>" href="login.php">Login</a>
                <a class="nav-link <?php echo_conditional(str_ends_with($_SERVER['PHP_SELF'], '/registration.php'), "active", ""); ?> <?php echo_conditional(is_logged_in(), "hidden", ""); ?>" href="registration.php">Registration</a>
                <a class="nav-link <?php echo_conditional(str_ends_with($_SERVER['PHP_SELF'], '/profile.php'), "active", ""); ?> <?php echo_conditional(is_logged_in(), "", "hidden"); ?>" href="profile.php">Profile</a>
                <a class="nav-link <?php echo_conditional(str_ends_with($_SERVER['PHP_SELF'], '/admin.php'), "active", ""); ?> <?php echo_conditional(is_admin(), "", "hidden"); ?>" href="admin.php">Admin console</a>
                <a class="nav-link <?php echo_conditional(is_logged_in(), "", "hidden"); ?>" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>