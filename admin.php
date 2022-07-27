<?php
   require('php/functions.php');
   require('php/session.php');

   if (!is_admin()) {
       error_unauthorized();
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin console</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

    <!-- Custom -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/icons.css">

    <style>
        label {
            margin-left: .5rem;
        }

        input[type="text"], textarea {
            width: 100%;
        }

        input[type="number"] {
            text-align: right;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include('components/navbar.php'); ?>

    <!-- New product modal -->
    <div class="modal" tabindex="-1" id="new-product-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="insert-product-form" enctype="multipart/form-data" action="api/insert-product.php" method="post">
                        <div class="mb-3">
                            <label for="new-product-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="new-product-name" name="name" oninput="check_name()">
                            <div class="invalid-feedback" id="new-product-name-error">Name cannot be empty.</div>
                        </div>
                        <div class="mb-3">
                            <label for="new-product-description" class="form-label">Description</label>
                            <textarea class="form-control" name="descr" id="new-product-description" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="new-product-price" class="form-label">Price</label>
                            <input type="number" min="0" value="5.00" step="0.01" class="form-control" id="new-product-price" name="price"></input>
                        </div>
                        <div class="mb-3">
                            <label for="new-product-price" class="form-label">Image</label>
                            <input type="file" class="form-control" id="new-product-image" name="img"></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="insert-product-form" class="btn btn-success">Insert</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="content-tab">
            <h1>Users</h1>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Permissions</th>
                    </tr>
                </thead>
                <tbody id="admins"></tbody>
            </table>
        </div>

        <div class="content-tab">
            <h1>Products</h1>
            <div class="row mb-4">
                <div class="col center">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-product-modal">
                        Insert new product
                    </button>
                </div>
            </div>
            

            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 20%">Name</th>
                        <th scope="col" style="width: 50%">Description</th>
                        <th scope="col" style="width: 20%">Price</th>
                        <th scope="col" style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody id="products"></tbody>
            </table>
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Custom -->
    <script src="scripts/admin.js"></script>
</body>
</html>