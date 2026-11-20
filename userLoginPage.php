<?php
    include 'db_connect.php';

    session_start();
?>

<!DOCTYPE html> 
<html>
   <head>
   
     <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>

    <!-- our own styles -->
    <link href="css/style_gismo.css" rel="stylesheet">
    <title>Capsule | Gismo</title>

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
                        <li class="nav-item"><a class="nav-link"  href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active"  href="SearchPage.php">Search</a></li>
                        <li class="nav-item"><a class="nav-link"  href="blog_page/blog.php">Blog</a></li>
                        <li class="nav-item" aria-current="page"><a href="userLoginPage.php" class="profile-btn" aria-label="Profile"></a></li>
                    </ul>
                     
                </div>
                
            </div>
             
        </nav>
    </header>
   
        
    <main class="flex-grow-1">
        <span id="user_name">
        <?php
          if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
            echo htmlspecialchars($_SESSION['username']);
          }
          
        ?>
        </span>&nbsp;&nbsp;
        <div id="backdrop"></div>
        <div id="login_modal" class ="box3 div-border div-no-border form-container"></div>
	  
        <img src="bootstrap/images/sc1.png" width="275px">
        <button class ="button3" onclick="showLoginModal()">Login</button>
   
        <div id="display_user"></div>
	</main>

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
	
    
    <script src = "js/loginScript.js" defer></script>
</body>
