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

      <?php endif ?>

      <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">

    </div>
  </div>


  <!------------------login page---------------->

  <div class="account-page">
    <div class="container">
      <div class="row">
        <div class="col-2">
          <img src="images/1.png" width="100%">
        </div>
        <div class="col-2">
          <div class="form-container">

            <?php
            if (isset($_POST['submit'])) {
              $count = 0;
              $res = mysqli_query($db, "SELECT * FROM register WHERE username='$_POST[username]' && password= '$_POST[password]';");
              $count = mysqli_num_rows($res);
              if ($count == 0) {
            ?>

                <div><strong>The Username and Password doesn't match.</strong></div>
              <?php
              } else {
              ?>
                <script type="text/javascript">
                  window.location = "cart.php"
                </script>
            <?php
              }
            }

            ?>
            <div class="form-btn">

              <span onclick="login()">Login</span>

            </div>


            <form action="" id="LoginForm" method="post">
              <?php include('errors.php'); ?>
              <input type="text" placeholder="Username" name="username">
              <input type="password" placeholder="password" name="password">
              <button type="submit" class="btn" name="login_user">Login</button>
              <a href="">Forgot Password</a>
            </form>


          </div>
        </div>
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

  <!----------------------js for toggle form--------------------->

  <script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");


    function register() {
      RegForm.style.transform = "translateX(0px)";
      LoginForm.style.transform = "translateX(0px)";
      Indicator.style.transform = "translateX(100px)";
    }

    function login() {
      RegForm.style.transform = "translateX(300px)";
      LoginForm.style.transform = "translateX(300px)";
      Indicator.style.transform = "translateX(0px)";
    }
  </script>

</body>