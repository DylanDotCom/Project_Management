<!DOCTYPE html!> 
<html>
   <head>
   <meta charset="utf-8">
      <title>Search | Gismo</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="js/script.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <link href="css/styles.css" rel="stylesheet">

        <!-- our own styles -->
        <link href="css/style_gismo.css" rel="stylesheet">

         <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
   </head>
	
   <body>
    
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="img/gismo_logo.png" alt="Logo"class="img-fluid logo"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link"  href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="SearchPage.php">Search</a></li>
                        <li class="nav-item"><a class="nav-link"  href="blog_page/blog.php">Blog</a></li>
                    </ul>
                     
                </div>
                <a href="userLoginPage.php" class="profile-btn" aria-label="Profile"></a>
            </div>
             
        </nav>
      
        <main class="flex-grow-1">
		<form class="search-form" onsubmit="return false;">
           
            <input type = "text" name = "users" class="search-input"
                            placeholder="Search cartoons..." aria-label="Search cartoons"
                            onkeyup="showHint(this.value)">
           
        </form>

	   <div class="container"><p>Suggestions: </p></div>
       
        <div id="txtHint" class="container"></div>
	
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
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
