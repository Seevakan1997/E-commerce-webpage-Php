<?php

include('server.php');

session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId'])) {
  header("location:admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin_panel</title>

  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>

<body class="body2">



  <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
  <div class="headder">
    <h1>ADMIN PANEL-<?php echo $_SESSION['AdminLoginId'] ?></h1>
    <a href="index.php"><img src="images/starstorelogo1.png" width="125"></a>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <button type="submit" name="logout">LOG OUT</button>
    </form>
  </div>

  <?php

  if (isset($_POST['logout'])) {
    session_destroy();
    header("location:admin.php");
  }

  ?>


  <div class="wrapper">
    <div class="sidebar">

      <ul>
        <li><a href="admin_home.php"><i class="fas fa-home"> Home</i></a></li>
        <li><a href="admin_product.php"><i class="fa fa-archive"></i> Products</a></li>
        <li><a href="#section3"><i class="fas fa-user"> Users</i></a></li>
        <li><a href="admin_oder.php"><i class="fa fa-cart-arrow-down"></i> Oders</a></li>
        <li><a href="#section5"><i class="fas fa-info"> About</i></a></li>
        <li><a href="#section6"><i class="fas fa-blog"> Blogs</i></a></li>
      </ul>
    </div>

  </div>

  <<div class="small-container cart-page">

    <table class="text-center">
      <tbody class="text-center">
        <tr class="text-center">
          <th width="40%">Item</th>
          <th width="20%">Price</th>
          <th width="10%">Quantity</th>


        </tr>
        <?php
        $total = 0;
        if (isset($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $key => $value) {
            $total = $total + $value['pprice'];
            echo "
          <tr>
            <td>$value[pname]</td>
            <td>$$value[pprice]</td>
            <td><input class='text-center' type='number' value='1'></td>
          
            <td>
            <form action='action.php' method='POST'>
          
            <input type='hidden' name='pname' value='$value[pname]'>
            </form>
            </td>
          </tr>
        ";
          }
        }
        ?>


      </tbody>

    </table>








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