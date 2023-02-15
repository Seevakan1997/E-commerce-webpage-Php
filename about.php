<?php
session_start();

include('server.php');
include 'master.php';



?>

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
        <a href="my_oders.php" style="width:30px; height:30px; padding-left:20px;"><i class="far fa-user-circle"></i></a>

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
  <?php
  include 'footer.php';
  ?>
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