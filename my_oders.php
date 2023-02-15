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
    <div class="container">
        <h1><?php echo $_SESSION['username']; ?></h1>
        <div class="small-container cart-page">
            <h3>My Purchases</h3>

            <table class="text-center">
                <tbody class="text-center">
                    <tr class="text-center">
                        <th width="40%">Item</th>
                        <th width="20%">Price</th>
                        <th width="10%">Quantity</th>
                    </tr>

                    <?php

                    // Check if the user is logged in
                    if (isset($_SESSION['username'])) {
                        // Get the user ID from the session
                        $user_id = (int)$_SESSION['userID'];

                        // Connect to the database
                        $db = mysqli_connect('localhost', 'root', '', 'webpage');

                        // Get the details of the products added to the cart by the current user
                        $query = "SELECT * FROM oders WHERE user_id = $user_id";
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
</form>
</td>
</tr>
";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No items in the purchase</td></tr>";
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


    </div>
</body>