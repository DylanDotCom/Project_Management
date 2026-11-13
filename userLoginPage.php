<!DOCTYPE html!> 
<html>
   <head>
   <meta charset="utf-8">
      <title>Home Page</title>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <link href="css/styles.css" rel="stylesheet">
   </head>
	
   <body>
   
        <div id="header">
            <ul>
                <li><h1>Project Management</h1></li>
				<li><a href="Index.html">Home</a></li>
				<li><a href="userLoginPage.php" class='on'>User Login</a></li>
				<li><a href="SearchPage.php">Search</a></li>

			</ul>
		</div>
        <form id="sockshow_form">

       </form>
      <div style="display: flex; justify-content: center; align-items: center; gap: 20px;">
    <span id="user_name">
        <?php
          if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
          }
          
        ?>
        </span>&nbsp;&nbsp;
            <div id="backdrop"></div>
        <div id="login_modal" class ="box3 div-border div-no-border form-container"></div>
	  
        <img src="bootstrap/images/sc1.png" width="275px">
        <button class ="button3" onclick="showLoginModal()">Login</button>
    </div>
    <div id="display_user"></div>

     <script src = "js/script.js" defer></script>
    <script src = "js/loginScript.js" defer></script>
</body>