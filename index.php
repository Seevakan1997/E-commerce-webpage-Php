<?php

$lifetime = 60 * 60 * 24 * 30;
session_set_cookie_params($lifetime);
session_start();

include('server.php');
// session_start();
// if (!isset($_SESSION['username'])) {
// 	$_SESSION['msg'] = "You must log in first";
// 	header('location: login.php');
// }
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
include 'master.php';

?>


<body>
	<div class="header">

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


			<div class="row">
				<div class="col-2">
					<h1>Give Your Workout <br> A New Style !</h1>
					<p>Success isn't always about greatness.It's about consistency.Consistent<br> hard work gains success.Greatness will come. </p>
					<a href="" class="btn">Explore Now &#8594;</a>
				</div>
				<div class="col-2">
					<img src="images/background1.png">
				</div>


			</div>
		</div>

	</div>

	<!------------Featured categories------------>

	<div class="categories">
		<div class="small-container">
			<div class="row">
				<div class="col-3">
					<img src="images/category-1.png">
				</div>
				<div class="col-3">
					<img src="images/category-6.png">
				</div>
				<div class="col-3"><img src="images/category-11.png">
				</div>
			</div>
		</div>

	</div>

	<!------------Featured products------------>

	<div class="small-container">
		<h2 class="title">Featured Products</h2>

		<div class="row">

			<?php
			$query = "SELECT * FROM  products1 ORDER BY p1_id ASC";
			$result = mysqli_query($db, $query);

			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_array($result)) {

			?>
					<div class="col-4">
						<form method="post" action="index.php?action=add$p1_id=<?php echo $row["p1_id"]; ?>">
							<img src="<?php echo $row["image"]; ?>" class="p1image" />
							<h4 class="p1name"><?php echo $row["name"];  ?></h4>
							<p class="p1price"><?php echo $row["price"]; ?></p>
							<div class="rating">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<a href="productdetails.php">More-Details</a>
						</form>
					</div>
			<?php
				}
			}
			?>

		</div>
		<!----------------------------Latest Produts-------------------------->
		<h2 class="title">Latest Products</h2>
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
							<div class="rating">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half" aria-hidden="true"></i>
							</div>
						</a>

					</div>
			<?php
				}
			}
			?>

		</div>
	</div>

	<!----------------Offer--------------->
	<div class="offer">
		<div class="small-container">
			<div class="row">
				<div class="col-2">
					<img src="images/smartband5.png" class="offer-img">
				</div>
				<div class="col-2">
					<p>Exclusivily available on Star Store</p>
					<h1>Smart Band 4</h1>
					<small>The Mi start Band 4 features a 39.9% larger AMOLED color Full Touch Display with adjustable brigtness,so everything is clear as can be. </small>
					<a href="" class="btn">Buy Now &#8594;</a>
				</div>
			</div>
		</div>
	</div>
	<!---------------testimonial---------------->
	<div class="testimonial">
		<div class="small-container">
			<div class="row">
				<div class="col-3">
					<p>Lorem Ipsum is simple dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever.</p>
					<img src="images/rank2.png" class="rating1">
					<img src="images/user-10.png">
					<h3>Shane Parker</h3>
				</div>
				<div class="col-3">
					<p>Lorem Ipsum is simple dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever.</p>
					<img src="images/rank2.png" class="rating1">
					<img src="images/user-4.png">
					<h3>Mike Simith</h3>
				</div>
				<div class="col-3">
					<p>Lorem Ipsum is simple dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever.</p>
					<img src="images/rank2.png" class="rating1">
					<img src="images/user-3.png">
					<h3>Adam Bastro</h3>
				</div>
			</div>
		</div>
	</div>
	<!------------------Brands--------------->

	<div class="brands">
		<div class="small-container">
			<div class="row">
				<div class="col-5">
					<img src="images/logo10.png">
				</div>
				<div class="col-5">
					<img src="images/logo20.png">
				</div>
				<div class="col-5">
					<img src="images/logo3000.png">
				</div>
				<div class="col-5">
					<img src="images/logo4.png">
				</div>
				<div class="col-5">
					<img src="images/logo50.png">
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

</body>