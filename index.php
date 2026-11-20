<?php
include 'db_connect.php';


?>
<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>

    <!-- our own styles -->
    <link href="css/style_gismo.css" rel="stylesheet">
    <title>Gismo</title>

     <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />

      <!-- fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
   
      
    </head>
	
   <body>
   
        <header>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/gismo_logo.png" alt="Logo"class="img-fluid logo"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="SearchPage.php">Search</a></li>
                        <li class="nav-item"><a class="nav-link"  href="blog_page/blog.php">Blog</a></li>
                    </ul>
                     
                </div>
                <a href="userLoginPage.php" class="profile-btn" aria-label="Profile"></a>
            </div>
             
        </nav>
       
        <section class="gismo_banner">
          <video src="img/gismo_banner.mp4"  autoplay muted loop playsinline>Gismo Banner</video>
        </section>

        </header>

      <main>
        <!-- VHS shelf -->
        <section class="vhs-shelf-wrap" aria-label="Browse cartoons">
          <div class="vhs-shelf">
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=$id' aria-label="Adventure Time">
            <img src="vhs_image/adventure_time.png" alt="Adventure Time VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=6' aria-label="Fairly Odd Parents">
            <img src="vhs_image/fairly_odd_parents.png" alt="Fairly Odd Parents VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=16' aria-label="Futurama">
            <img src="vhs_image/futurama.png" alt="Futurama VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=3' aria-label="Gravity Falls">
            <img src="vhs_image/gravity_falls.png" alt="Gravity Falls VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=10' aria-label="Kim Possible">
            <img src="vhs_image/kim_possible.png" alt="Kim Possible VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=$id' aria-label="Looney Tunes">
            <img src="vhs_image/looney_tunes.png" alt="Looney Tunes VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=20' aria-label="Phineas and Ferb">
            <img src="vhs_image/phineas_and_ferb.png" alt="Phineas and Ferb VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=$id' aria-label="Powerpuff Girls">
            <img src="vhs_image/powerpuff_girls.png" alt="Powerpuff Girls VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=$id' aria-label="Scooby Doo">
            <img src="vhs_image/scooby_doo.png" alt="Scooby Doo VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=11' aria-label="Teen Titans">
            <img src="vhs_image/teen_titans.png" alt="Teen Titans VHS tape">
           </a>
           <a class="vhs-tape" href='cartoon_pages/episodes.php?id=2' aria-label="The Simpsons">
            <img src="vhs_image/the_simpsonbs.png" alt="The Simpsons VHS tape">
           </a>
          </div>
        </section>

      </main>
	      

      
    

     <!-- Footer-->
       <footer class="py-4 bg-dark">
        <div class="container footer-row">

          <div class="footer-side footer-left">
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button" aria-label="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button" aria-label="GitHub">
              <i class="fab fa-github"></i>
            </a>
          </div>

          <a class="footer-logo" href="index.php">
            <img src="img/gismo_logo.png" alt="Gismo logo">
          </a>

          <p class="footer-side footer-right m-0 text-white">copyright &copy; Gismo 2026</p>

        </div>
      </footer>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
	
</body>
</html>
