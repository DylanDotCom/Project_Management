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
                <a href="login.php" class="profile-btn" aria-label="Profile"></a>
            </div>
             
        </nav>
        <!-- Background image -->
        <div id="intro-example" class="p-5 text-center header_img">
          <div class="mask">
            <div class="d-flex justify-content-center align-items-center h-100">
              <div class="text-black">
                <h1 class="mb-3 freckle-face-regular gismo">GISMO</h1>
                <h5 class="mb-4">
                  Find cartoon you’ve once watched.
                </h5>
                <h5 class="mb-4">Save those you want to see.</h5>
                <h5 class="mb-4">Tell your friends what’s good.</h5>
                <a data-mdb-ripple-init class="btn btn-outline-light btn-lg m-2" href="login.php"
                  role="button" rel="nofollow" target="_blank">Login</a>
                <a data-mdb-ripple-init class="btn btn-outline-light btn-lg m-2" href="SearchPage.php"
                  target="_blank" role="button">Search</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Background image -->

        </header>


	      

      
    

     <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Gismo 2026</p></div>
        </footer>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
	
</body>
</html>
