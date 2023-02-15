<?php


$lifetime = 60 * 60 * 24 * 30;
session_set_cookie_params($lifetime);
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
    <!-----------------single product details------------------------>
    <div class="row">
        <?php
        if (isset($_GET['p_id'])) {
            $p_id = $_GET['p_id'];
            // $p_id = $_GET["p_id"];
            $sql = "SELECT * FROM latest_product WHERE p2_id='$p_id'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);
            // retrieve product details using $p_id from the database
            // ...

            // access product details
            $image = $row["image"];
            $name = $row["name"];
            $price = $row["price"];
            // $rating = $row["rating"];
        }
        ?>



        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <img src="<?php echo $row["image"]; ?>" width="100%" id="ProductImg">
                    <!-- <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="<?php echo $row["sm1"];  ?>" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="<?php echo $row["sm2"];  ?>" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="<?php echo $row["sm3"];  ?>" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="<?php echo $row["sm4"];  ?>" width="100%" class="small-img">
                        </div>
                    </div> -->
                </div>
                <div class="col-2">

                    <h1><?php echo $row["name"];  ?></h1>
                    <h4><?php echo $row["price"]; ?></h4>
                    <select>
                        <option>Select Size</option>
                        <option>XXL</option>
                        <option>XL</option>
                        <option>Large</option>
                        <option>Medium</option>
                        <option>Small</option>
                    </select>
                    <input type="number" value="1">
                    <button class="btn btn-info btn-block  " name="Add_To_Cart">Add to Cart</button>

                    <h3>Product Details</h3>
                    <br>
                    <p>"<?php echo $row["details"];  ?>" </p>

                </div>


                <!-- <form class="form-submit" action="action.php" method="POST">
                    <input type="hidden" name="product_id" class="pid" value="<?php echo $row["id"];  ?>" />
                    <input type="hidden" name="pname" value="<?php echo $row["name"];  ?>" />
                    <input type="hidden" name="pprice" value="<?php echo $row["price"];  ?>" />
                    <input type="hidden" name="pimage" value="<?php echo $row["image"];  ?>" />
                    <input type="hidden" name="details" value="<?php echo $row["details"];  ?>" />
                    <input type="hidden" name="sm1" value="<?php echo $row["sm1"];  ?>" />
                    <input type="hidden" name="sm2" value="<?php echo $row["sm2"];  ?>" />
                    <input type="hidden" name="sm3" value="<?php echo $row["sm3"];  ?>" />
                    <input type="hidden" name="sm4" value="<?php echo $row["sm4"];  ?>" />




                </form> -->
            </div>
        </div>



    </div>
    </div>
    </div>

    <!--------------------------title------------------->
    <div class="small-container">
        <div class="row row-2">
            <!-- <h2>Related Products</h2>
            <p>View more</p> -->
        </div>


    </div>




    <!-------------products--------------->
    <!-- <div class="small-container">

    <div class="row">
      <div class="col-4">
        <img src="images/product-5.png">
        <h4>Men Black Watch</h4>
        <p>$20.00</p>
        <div class="rating">
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half" aria-hidden="true"></i>
        </div>
      </div>
      <div class="col-4">
        <img src="images/product-6.png">
        <h4>Men Model Shirt</h4>
        <p>$50.00</p>
        <div class="rating">
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
        </div>
      </div>
      <div class="col-4">
        <img src="images/product-7.png">
        <h4>iphone XE</h4>
        <p>$150.00</p>
        <div class="rating">
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>

        </div>
      </div>
      <div class="col-4">
        <img src="images/product-8.png">
        <h4>Girls Party Shoe</h4>
        <p>$90.00</p>
        <div class="rating">
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half" aria-hidden="true"></i>
        </div>
      </div>

    </div>


  </div> -->

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
    <!--------------------js for product gallery-------------------->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function() {
            ProductImg.src = SmallImg[0].src;

        }
        SmallImg[1].onclick = function() {
            ProductImg.src = SmallImg[1].src;

        }
        SmallImg[2].onclick = function() {
            ProductImg.src = SmallImg[2].src;

        }
        SmallImg[3].onclick = function() {
            ProductImg.src = SmallImg[3].src;

        }
    </script>


</body>