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
        .bg1 {
            background-image: url(res/genova.jpg);
            height: 80vh;
        }
    </style>
</head>
<body>
    <div class="parallax bg1"></div>

    <!-- Navbar -->
    <?php include('components/navbar.html'); ?>

    <div class="container">
        <div class="content-tab">
            <h1>Introduzione</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt labore ut enim temporibus possimus assumenda saepe dolores, mollitia, fuga reiciendis eos deleniti nobis molestias dolore dicta fugit deserunt cupiditate ipsa?</p>
        </div>
        <div class="content-tab">
            <h1>Le nostre specialità</h1>
            <div class="row">
                <div class="col center"><i class="bi bi-stars icon-big icon-gold"></i></div>
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide slideshow" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="res/DSC_0653b-1024x1536.jpg" class="d-block w-100">
                          </div>
                          <div class="carousel-item">
                            <img src="res/DSC_0468-1024x1536.jpg" class="d-block w-100">
                          </div>
                          <div class="carousel-item">
                            <img src="res/DSC_1052.jpg" class="d-block w-100">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col center"><i class="bi bi-stars icon-big icon-gold"></i></div>
            </div>
        </div>

        <div class="content-tab">
            <h1>La nostra storia</h1>
            <div class="row">
                <div class="col">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla asperiores animi rem recusandae illum maxime tempore corporis repudiandae facere, ut quas maiores porro nobis possimus suscipit iure dolorum beatae ab? Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus reiciendis, earum sunt, minima expedita, dolores ipsam in voluptatum qui obcaecati corporis incidunt dignissimos aut voluptatem ipsum. Asperiores illo totam et!</p>
                </div>
                <div class="col">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur aspernatur temporibus nisi assumenda aliquid amet, in laboriosam cum a! Nesciunt laudantium et numquam modi quo minima nemo hic doloribus dolores?</p>
                </div>
                <div class="col center">
                    <i class="bi bi-bookmark-heart icon-big icon-gold"></i>
                </div>
            </div>
        </div>

        <div class="content-tab">
            <h1>Seguici sui social!</h1>
            <div class="center">
                <a class="bi bi-facebook social social-facebook"></a>
                <a class="bi bi-instagram social social-instagram"></a>
                <a class="bi bi-linkedin social social-linkedin"></a>
                <a href="https://github.com/DavidePonzini/web-tutorial" class="bi bi-github social social-github"></a>
            </div>
        </div>
    </div>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>