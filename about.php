<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>About US-Star Store</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
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
          <li><a href="about.php">About</a></li>
          <?php if (!isset($_SESSION['username'])) : ?>
            <li><a href="register.php">Register</a></li>

            <li><a href=""> Login</a>
              <div class="sub_menu">
                <ul>
                  <li><a href="login.php">User-Login</a></li>
                  <li><a href="admin.php">Admin-login</a></li>
                </ul>
              </div>
            </li>
          <?php endif ?>

        </ul>
      </nav>
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
          <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>

      <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
        <p> <a href="index.php?logout='1'" style="color: red; padding-right:50px;">logout</a> </p>

        <a href="cart.php"><img src="images/cart3.png" width="30px" height="30px"></a>

      <?php endif ?>

      <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">

    </div>

  </div>
  <div class="section">

    <div class="about">

      <div class="content-section">
        <div class="title">
          <h1>About Us</h1>
        </div>
        <div class="content">
          <h3>The First Star Store Was Our Own</h3>
          <p>Over a Decade ago, We started a Store to sell All produts online.None of the ecommerce solutions at the time gave us the contol we need to be Successful so we built our own.Today,Businesses of all sizes use Star Store whether they're selling online, in real stores,or on-the-go </p>
          <div class="button">
            <a href="">Read More</a>
          </div>
        </div>
        <div class="social">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="image-section">
        <img src="images/about.jpg">
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
    var menuItems = document.getElementById("menuItems");
    menuItems.style.maxHeight = "0px";

    function menutoggle() {

      if (menuItems.style.maxHeight == "0px") {
        menuItems.style.maxHeight = "200px";
      } else {
        menuItems.style.maxHeight = "0px";
      }
    }
  </script>

</body>

</html>