<?php
session_start();

include('server.php');
include 'master.php';

// Get the form data
$product_id = $_GET['product_id'];
$name = $_GET['name'];
$price = $_GET['price'];
$quantity = $_GET['quantity'];



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
        <div class="product-details">
            <h4>Product Name: <?php echo $name; ?></h4>
            <p>Quantity: <?php echo $quantity; ?></p>
            <p>Total Cost: $<?php echo $price * $quantity; ?></p>
        </div>
        <br>
        <h2 class="text-center">Payment Page</h2>
        <form action="payment_process.php" method="post">
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="card_number" placeholder="Enter your card number" required />
            </div>
            <div class="form-group">
                <label for="cardHolder">Card Holder</label>
                <input type="text" class="form-control" id="cardHolder" name="card_holder" placeholder="Enter the name on the card" required />
            </div>
            <div class="form-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiry_date" placeholder="MM/YY" required />
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required />
            </div>
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
            <input type="hidden" name="purchase_complete" value="true">
            <button type="submit" class="btn btn-primary center-block">
                Buy
            </button>
        </form>

    </div>
</body>