<?php
session_start();

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
        <li><a href="admin_users.php"><i class="fas fa-user"> Users</i></a></li>
        <li><a href="admin_oder.php"><i class="fa fa-cart-arrow-down"></i> Oders</a></li>
        <li><a href="#section5"><i class="fas fa-info"> About</i></a></li>
        <li><a href="#section6"><i class="fas fa-blog"> Blogs</i></a></li>
      </ul>
    </div>

  </div>
  <div class="small-container1">

    <div class="small-container cart-page">
      <h3>Oders</h3>

      <table class="text-center">
        <tbody class="text-center">
          <tr class="text-center">
            <th width="20%">User</th>
            <th width="40%">Item</th>
            <th width="20%">Price</th>
            <th width="10%">Quantity</th>
            <th width="10%">Action</th>


          </tr>
          <?php


          // Connect to the database
          $db = mysqli_connect('localhost', 'root', '', 'webpage');

          if (isset($_POST['remove_oder'])) {
            // Get the product id to be removed
            $product_id = $_POST['product_id'];


            // Remove the item from the database
            $query = "DELETE FROM oders WHERE product_id = $product_id";
            $result = mysqli_query($db, $query);

            if ($result) {
              // Redirect the user back to the cart page
              header("Location: admin_oder.php");
              exit;
            } else {
              echo "Error removing item from cart";
            }
          }



          // Get the details of the products added to the cart by the current user
          $query = "SELECT o.user_id, o.product_id, o.name, u.username, o.price, o.quantity FROM oders o JOIN register u ON o.user_id = u.reg_id";
          $result = mysqli_query($db, $query);
          mysqli_error($db);
          // Check if there are any results
          if (mysqli_num_rows($result) > 0) {

            // Loop through the results and display them
            while ($row = mysqli_fetch_assoc($result)) {
              $user_id = $row['user_id'];
              $product_id = $row['product_id'];
              $username = $row['username'];
              $name = $row['name'];
              $price = $row['price'];
              $quantity = $row['quantity'];

              echo "
<tr>
<td>$username</td>
<td>$name</td>
<td>$$price</td>
<td>$quantity</td>
<td>
<form action='admin_oder.php' method='POST'>
<input type='hidden' name='product_id' value='$product_id'>
<input type='hidden' name='name' value='$name'>
<input type='hidden' name='price' value='$price'>
<input type='hidden' name='quantity' value='$quantity'>
<button name='accept_oder' class='btn btn-info btn-outline-danger' style='background-color:#00D100;'>Accept</button>
<button name='remove_oder' class='btn btn-info btn-outline-danger' onclick='return confirm(\"Are you sure you want to remove this item from orders?\");'>Remove</button>
</form>
</td>
</tr>
";
            }
          } else {
            echo "<tr><td colspan='4'>No Orders</td></tr>";
          }

          // Close the database connection
          mysqli_close($db);

          ?>


        </tbody>

      </table>

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