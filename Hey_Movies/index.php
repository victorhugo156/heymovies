<?php
require "./src/connect-db.php";
require "./src/Model/Movie.php";
require "./src/Repository/MovieRepository.php";

$movieRepository = new MovieRepository($pdo);
$dataImageMovieCarousel = $movieRepository->movieImageCarousel();

$dataImageCards = $movieRepository->movieCard();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hey Movies</title>
    <!-- BOOTSTRAP - ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/reset.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/index.css">
</head>

<body class="body">
    <div class="divider-nav-to-main"></div>
    <?php
    require "./partials/nav.php"
    ?>
    <main class="container mt-5">
        <!-- CAROUSEL -->
        <section>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($dataImageMovieCarousel as $cards) : ?>
                        <div class="carousel-item active">
                            <img src="<?= $cards->getImageTwoUrl() ?>" class="d-block w-100" alt="..." style="height: 400px; object-fit: cover; object-position: center top;">
                        </div>
                    <?php endforeach; ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
        </section>

        <section class="container" style="margin-top: 50px;">
            <div class="header-cards">
                <div class="container-header-title">
                    <span class="bullet"></span>
                    <h1 class="title">Trending Now</h1>
                </div>
                <div class="col-md-6 col-lg-6 max-auto search-box">
                    <div class="input-group form container">
                        <input type="text" name="search" id="search-movie" class="form-control search-input" placeholder="search movie" autofocus="autofocus">
                    </div>
                </div>

            </div>
            <section class="row">
                <?php foreach ($dataImageCards as $cards) : ?>
                    <div class="col-md-3 mb-4">
                        <div class="product__item__pic">
                            <a href="movie.php?id=<?= $cards->getId() ?>">
                                <img src="<?= $cards->getImageUrl() ?>" class="card-img-top" alt="<?= $cards->getMovieTitle() ?>" style="width: 254px;">
                                <div class="card-bodies d-flex flex-column">
                                    <div class="ep"><?= $cards->getMovieGenere()?></div>
                                    <div class="comment"><i class="fa fa-comments"><?= $cards->getStreamingService() ?></i></div>
                                    <div class="view"><i class="fa fa-eye"><?= $cards->getMovieLanguage() ?></i></div>
                                </div>
                            </a>
                        </div>
                        <div class="container-cta">
                            <p class="card-title"><?= $cards->getMovieTitle() ?></p>
        
                            <div class="mt-auto">
                                <a href="movie.php?id=<?= $cards->getId() ?>" class="btn btn-primary btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2021 Hey Movie Review. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>