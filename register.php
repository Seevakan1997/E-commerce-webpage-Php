<?php

include "database.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Account-Star Store</title>
  <link rel="stylesheet"  href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body>

    <div class="container">
     <div class="navbar"> 
      <div class="logo">
       <a href="index.php"><img src="images/starstorelogo1.png" width="125"></a>
      </div>
      <nav>
    	<ul id="menuItems">
    		<li><a href="index.php">Home</a></li>
    		<li><a href="products.php">Products</a></li>
    		<li><a href="about.html">About</a></li>
    		<li><a href="register.php">Register</a></li>
    		<li><a href=""> Login</a>
			  <div class="sub_menu">
				  <ul>
					  <li><a href="login.php">User-Login</a></li>
					  <li><a href="admin.php">Admin-login</a></li>
				  </ul>
			  </div>
			  </li>
			
    	</ul>
    </nav>
    <a href="login.php"><img src="images/cart3.png" width="30px" height="30px"></a>
    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
  </div>
    </div>


<!------------------Register page---------------->
    
    <div class="account-page">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="images/1.png" width="100%">
          </div>
          <div class="col-2">
            <div class="form-container">
              
              
               <div class="form-btn">
                 
                 <span onclick="register()">Register</span>
                 
               </div>
              
               
               <?php
                if(isset($_POST["submit"]))
                {
                   $sql="INSERT INTO register(username,gmail,password) values('{$_POST["rname"]}','{$_POST["rmail"]}','{$_POST["rpass"]}')";
                   $db->query($sql);
                   echo "Register Successfully";
              echo "<script>
                      window.location.href='login.php';
                    </script>";
                }

              ?>
               <form id="RegForm" action="register.php" method="post">
                 <input type="text" placeholder="Username" name="rname" required>
                 <input type="email" placeholder="Email" name="rmail" required>
                 <input type="password" placeholder="password" name="rpass" required>
                 <button type="submit" class="btn" name="submit"> Register</button>
                
                 
               </form>


            </div>
          </div>
        </div>
      </div>
    </div>
    

<!-----------------footer---------------------->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-col-1">
        <h3>Download Our App</h3>
        <p>Download Apps for Android and IOS mobile phone.</p>
        <div class="app-logo">
          <img src="images/play-store0.png">
          <img src="images/app-store.png">
        </div>
      </div>
      <div class="footer-col-2">
        <img src="images/starstorelogo1.png">
        <p>Our purpose is to sustainably make the pleasure and benefits of sports accessible to the many.</p>
      </div>
      <div class="footer-col-3">
        <h3>Useful links</h3>
        <ul>
          <li>Coupons</li>
          <li>Blog post</li>
          <li>Return Policy</li>
          <li>Join Affiliate</li>
        </ul>
      </div>
      <div class="footer-col-4">
        <h3>Follow us</h3>
        <ul>
          <li>Facebook</li>
          <li>Twitter</li>
          <li>Instagram</li>
          <li>YouTube</li>
        </ul>
      </div>
    </div>
    <hr>
    <p class="copyright">Copyright 2021-Star Store</p>
  </div>
</div>
<!----------------------js for toggle menu--------------------->

<script>
  var menuItems=document.getElementById("menuItems");
  menuItems.style.maxHeight="0px";
  function menutoggle(){

    if(menuItems.style.maxHeight=="0px"){
      menuItems.style.maxHeight="200px";
    }
    else{
            menuItems.style.maxHeight="0px";
    }
  }

</script>

<!----------------------js for toggle form--------------------->

<script>
  
var LoginForm= document.getElementById("LoginForm");
var RegForm= document.getElementById("RegForm");
var Indicator= document.getElementById("Indicator");


        function register(){
          RegForm.style.transform = "translateX(0px)";
          LoginForm.style.transform = "translateX(0px)";
          Indicator.style.transform = "translateX(100px)";
        }
         function login(){
          RegForm.style.transform = "translateX(300px)";
          LoginForm.style.transform = "translateX(300px)";
          Indicator.style.transform = "translateX(0px)";
        }
  

</script>

</body>
</html>