<!DOCTYPE html!> 
<html>
   <head>
   <meta charset="utf-8">
      <title>Search | Gismo</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <link href="css/styles.css" rel="stylesheet">

        <!-- our own styles -->
        <link href="css/style_gismo.css" rel="stylesheet">

         <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico" />
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
                <a href="login.php" class="profile-btn" aria-label="Profile"></a>
            </div>
             
        </nav>
      
		 <form>
           <div>
            <input type = "text" name = "users" onkeyup="showHint(this.value)">
           </div>
       </form>
       <span id="txtHint"></span>
        <p>Suggestions: <span id="txtHintInfo"></span></p>
	
    
	

     <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Gismo 2026</p></div>
        </footer>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>