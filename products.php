<?php

$lifetime = 60 * 60 * 24 * 30;
session_set_cookie_params($lifetime);
session_start();

include('server.php');

include 'master.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>All Products-Star Store</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

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


  <div class="small-container">
    <div id="message"></div>
    <div class="row row-2">
      <h2>All Products</h2>
      <select>
        <option>Default Shorting</option>
        <option>Short by price</option>
        <option>Short by popularity</option>
        <option>Short by rating</option>
        <option>Short by sale</option>
      </select>
    </div>

    <div class="row">
      <?php
      $query = "SELECT * FROM  latest_product ORDER BY p2_id ASC";
      $result = mysqli_query($db, $query);

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

      ?>
          <div class="col-4">
            <a href="product_details.php?p_id=<?php echo $row["p2_id"]; ?>">
              <img src="<?php echo $row["image"]; ?>" class="p2image" />
              <h4 class="p2name"><?php echo $row["name"];  ?></h4>
              <p class="p2price">$<?php echo $row["price"]; ?></p>
            </a>
            <?php if (isset($_SESSION['username'])) : ?>
              <form action="cart.php" method="post">
                <input type="hidden" name="p_id" value="<?php echo $row["p2_id"]; ?>">
                <input type="hidden" name="name" value="<?php echo $row["name"]; ?>">
                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                <input type="hidden" name="image" value="<?php echo $row["image"]; ?>">
                <button class="btn btn-info btn-block " name="Add_To_Cart">Add to Cart</button>
              </form>

            <?php endif ?>

            <div class="rating">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star-half" aria-hidden="true"></i>
            </div>

          </div>
      <?php
        }
      }
      ?>

    </div>
  </div>
  <div class="row">
    <div class="page-btn">
      <span>1</span>
      <span>2</span>
      <span>3</span>
      <span>4</span>
      <span>&#8594;</span>
    </div>
  </div>


  </div>
  < <!-----------------footer---------------------->
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
    <!-- <script type="text/javascript">
    $(document).ready(function(){
      $(".addItemBtn").click(function(e){
          e.preventDefault();
          var $form=$(this).closest(".form-submit");
          var pid= $form.find(".pid").val();
          var pname= $form.find(".pname").val();
          var pprice= $form.find(".pprice").val();
          var pimage= $form.find(".pimage").val();
          var pcode= $form.find(".pcode").val();
          $.ajax({
           url: 'action.php',
           method: 'post',
           data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
           success:function(response){
             $("#message").html(response);
           }
          });
      });
    });

</script> -->
</body>

</html>