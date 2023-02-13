<?php

$lifetime = 60 * 60 * 24 * 30;
session_set_cookie_params($lifetime);
session_start();
include('server.php');


if (isset($_GET['logout'])) {
  // session_destroy();
  header("Location: login.php");
  exit;
}
if ($_SERVER['PHP_SELF'] !== '/cart.php' && !isset($_SESSION['reg_id'])) {
  header('Location: login.php');
  exit;
}

include 'master.php';
if (isset($_POST['Add_To_Cart'])) {
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $value = array(
    'pname' => $_POST['name'],
    'pprice' => $_POST['price'],
    'pid' => $_POST['p_id'],
    'quantity' => 1
  );
  array_push($_SESSION['cart'], $value);


  $product_id = $_POST['p_id'];
  $quantity = 1;

  // Get user ID from the session
  $user_id = (int) $_SESSION['userID'];
  if (isset($user_id) && is_numeric($user_id)) {
    // Insert the product into the user's cart
    // ...
  } else {
    echo "Error: user_id is not set or is not a valid integer.";
  }
  // Check if the product is already in the cart for the current user
  $query = "SELECT * FROM user_cart WHERE product_id = '$product_id' AND user_id = '$user_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_array($result);

  if ($row) {
    // If the product is already in the cart, update the quantity
    $new_quantity = $row['quantity'] + $quantity;
    $update_query = "UPDATE user_cart SET quantity = '$new_quantity' WHERE product_id = '$product_id' AND user_id = '$user_id'";
    mysqli_query($db, $update_query);
  } else {
    // If the product is not in the cart, add it
    $insert_query = "INSERT INTO user_cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '$quantity')";
    mysqli_query($db, $insert_query);
  }
}
// header('Location: products.php');
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

  <!---------------------cart item details------------>
  <div class="small-container cart-page">

    <table class="text-center">
      <tbody class="text-center">
        <tr class="text-center">
          <th width="40%">Item</th>
          <th width="20%">Price</th>
          <th width="10%">Quantity</th>
          <th width="10%">Action</th>
        </tr>
        <?php

        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
          // Get the user ID from the session
          $user_id = (int)$_SESSION['userID'];

          // Connect to the database
          $db = mysqli_connect('localhost', 'root', '', 'webpage');

          if (isset($_POST['remove_item'])) {
            // Get the product id to be removed
            $product_id = $_POST['product_id'];

            // Remove the item from the cart session
            unset($_SESSION['cart'][$product_id]);

            // Remove the item from the database
            $query = "DELETE FROM user_cart WHERE product_id = $product_id AND user_id = $user_id";
            $result = mysqli_query($db, $query);

            if ($result) {
              // Redirect the user back to the cart page
              header("Location: cart.php");
              exit;
            } else {
              echo "Error removing item from cart";
            }
          }




          // Get the details of the products added to the cart by the current user
          $query = "SELECT p.product_id, pd.name, pd.price, p.quantity 
            FROM user_cart p 
            JOIN latest_product pd ON p.product_id = pd.p2_id 
            WHERE p.user_id = $user_id";
          $result = mysqli_query($db, $query);
          mysqli_error($db);
          // Check if there are any results
          if (mysqli_num_rows($result) > 0) {

            // Loop through the results and display them
            while ($row = mysqli_fetch_assoc($result)) {
              $product_id = $row['product_id'];
              $name = $row['name'];
              $price = $row['price'];
              $quantity = $row['quantity'];

              echo "
      <tr>
        <td>$name</td>
        <td>$$price</td>
        <td>$quantity</td>
        <td>
        <form action='cart.php' method='POST'>
        <input type='hidden' name='product_id' value='$product_id'>
        <input type='hidden' name='name' value='$name'>
        <input type='hidden' name='price' value='$price'>
        <input type='hidden' name='quantity' value='$quantity'>
        <button name='buy_item' class='btn btn-info btn-outline-danger' style='background-color:#00D100;'>Buy</button>
        <button name='remove_item' class='btn btn-info btn-outline-danger' onclick='return confirm(\"Are you sure you want to remove this item from cart?\");'>Remove</button>
        </form>
        </td>
      </tr>
    ";
            }
          } else {
            echo "<tr><td colspan='4'>No items in the cart</td></tr>";
          }

          // Buy the item
          if (isset($_POST['buy_item'])) {
            // Get the product ID and quantity
            $product_id = $_POST['product_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            // Add the product to the session cart
            $_SESSION['cart'][$product_id] = $quantity;

            // Redirect to the payment page with product details
            header("Location: payment.php?product_id=$product_id&name=$name&price=$price&quantity=$quantity");
            exit;
          }


          // Close the database connection
          mysqli_close($db);
        }
        ?>

      </tbody>

    </table>



  </div>


  <div class="col">
    <!-- <h3>Total: $<?php echo $total  ?></h3> -->

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