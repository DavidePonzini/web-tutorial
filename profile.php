<?php
   require('php/functions.php');
   require('php/session.php');

   if (!is_logged_in())
       redirect('login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

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
            <h1>Profile</h1>
            <div class="row">
                <div class="col center">
                    <h2>Name</h2>
                    <p id="name"></p>
                    
                    <hr>
                    <h2>Email</h2>
                    <p id="email"></p>
                    
                    <hr>
                    <h2>Age</h2>
                    <p><span id="age"></span> seconds</p>
                    
                    <div id="newsletter" class="hidden">
                        <hr>
                        <h2>You are subscribed to the newsletter.</h2>
                    </div>

                    <div id="admin" class="hidden">
                        <hr>
                        <h2>You have admin privileges!</h2>
                    </div>
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
    <script src="scripts/profile.js"></script>
</body>
</html>