<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

    <!-- Custom -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/social.css">
    <link rel="stylesheet" href="styles/icons.css">

    <!-- Only on this page -->
    <style>
        #products {
            text-align: center;
            margin-bottom: 68px;
        }

        .buy-btn-text {
            margin-left: 1rem;
        }

        .buy-btn-text:hover {
            cursor: pointer;
        }

        .card-title {
            height: 48px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.html'); ?>

    <div class="container">
        <div class="content-tab">
            <h1>I nostri articoli</h1>
            <div id="products"></div>
        </div>
    </div>

    <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-text">Totale <span id="totale">0</span> $</span>
            <a class="btn btn-primary" href="">Acquista</a>
        </div>
    </nav>           

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Custom -->
    <script src="scripts/products.js"></script>
</body>
</html>