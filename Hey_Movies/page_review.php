<?php

require "./src/connect-db.php";
require "./src/Model/Review.php";
require "./src/Model/Movie.php";
require "./src/Repository/ReviewRepository.php";
require "./src/Repository/MovieRepository.php";


if (isset($_POST['register'])) {
   
   $review = new Review(null, 
   $_POST['username'], 
   $_POST['rate'], 
   $_POST['textarea'], 
   null, 
   null);
   
   $reviewRepository = new ReviewRepository($pdo);
   $reviewRepository->saveData($review);
   // var_dump($reviewRepository);
   // exit();


   header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./style/reset.css">
   <title>Hey Movies</title>
   <!-- BOOTSTRAP - ICON -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   <!-- BOOTSTRAP -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./style/style.css">
   <link rel="stylesheet" href="./style/review.css">
</head>

<body>
<div class="divider-nav-to-main"></div>

   <?php
   require "./partials/nav.php"
   ?>

   <main class="container-config">
      <div class="container-form">
         <form method="POST">
            <div class="mb-3 container-label">
               <label for="username" class="form-label">Name</label>
               <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="user name" name="username">
            </div>
            <div class="mb-3 container-label">
               <label for="textarea" class="form-label">Comment</label>
               <textarea class="form-control" id="exampleFormControlTextarea1" name="textarea" rows="3"></textarea>
            </div>
            <fieldset class="row mb-3 container-label">
               <legend class="col-form-label col-sm-2 pt-0">Rate it:</legend>
               <div class="col-sm-10">
                  <div class="rate-values">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="rate" id="gridRadios1" value="1" checked="">
                        <label class="form-check-label" for="rate">
                           1
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="rate" id="gridRadios2" value="2" checked="">
                        <label class="form-check-label" for="rate">
                           2
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="rate" id="gridRadios3" value="3" checked="">
                        <label class="form-check-label" for="rate">
                           3
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="rate" id="gridRadios4" value="4" checked="">
                        <label class="form-check-label" for="rate">
                           4
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="rate" id="gridRadios5" value="5" checked="">
                        <label class="form-check-label" for="rate">
                           5
                        </label>
                     </div>

                  </div>

               </div>
            </fieldset>
            <input type="submit" name="register" value="register review">
         </form>
      </div>
   </main>

   <footer class="bg-dark text-white text-center py-3">
      <p>&copy; 2021 Hey Movie Review. All rights reserved.</p>
   </footer>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>