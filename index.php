
<?php

include "database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Star Store</title>
	<link rel="stylesheet"  href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
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
    		<li><a href="about.html">About</a></li>
    		<li><a href="register.php">Register</a></li>
    		<li><a href=""> Login</a>
			  <div class="sub_menu">
				  <ul>
					  <li><a href="login.php">User-Login</a></li>
					  <li><a href="admin.php">Admin-login</a></li>
				  </ul>
			  </div>
			  </li>
			
    	</ul>
    </nav>
	
    <a href="login.php"><img src="images/cart3.png" width="30px" height="30px"></a>
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
             $query= "SELECT * FROM  products1 ORDER BY p1_id ASC";
			 $result=mysqli_query($db,$query);

			 if(mysqli_num_rows($result)>0){
              
				while($row =mysqli_fetch_array($result)){

					?>
					<div class="col-4">
						<form method="post" action="index.php?action=add$p1_id=<?php echo $row["p1_id"];?>">
                              <img src="<?php echo $row["image"]; ?>" class="p1image"/>
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
             $query= "SELECT * FROM  latest_product ORDER BY p2_id ASC";
			 $result=mysqli_query($db,$query);

			 if(mysqli_num_rows($result)>0){
              
				while($row =mysqli_fetch_array($result)){

					?>
					<div class="col-4">
						<form method="post" action="index.php?action=add$p1_id=<?php echo $row["p2_id"];?>">
                              <img src="<?php echo $row["image"]; ?>" class="p2image"/>
							  <h4 class="p2name"><?php echo $row["name"];  ?></h4>
                              <p class="p2price"><?php echo $row["price"]; ?></p>
							  <div class="rating">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half" aria-hidden="true"></i>
								</div>
						</form>
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
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-1">
				<h3>Download Our App</h3>
				<p>Download Apps for Android and IOS mobile phone.</p>
				<div class="app-logo">
					<img src="images/play-store0.png">
					<img src="images/app-store.png">
				</div>
			</div>
			<div class="footer-col-2">
				<img src="images/starstorelogo1.png">
				<p>Our purpose is to sustainably make the pleasure and benefits of sports accessible to the many.</p>
			</div>
			<div class="footer-col-3">
				<h3>Useful links</h3>
				<ul>
					<li>Coupons</li>
					<li>Blog post</li>
					<li>Return Policy</li>
					<li>Join Affiliate</li>
				</ul>
			</div>
			<div class="footer-col-4">
				<h3>Follow us</h3>
				<ul>
					<li>Facebook</li>
					<li>Twitter</li>
					<li>Instagram</li>
					<li>YouTube</li>
				</ul>
			</div>
		</div>
		<hr>
		<p class="copyright">Copyright 2021-Star Store</p>
	</div>
</div>
<!----------------------js for toggle menu--------------------->

<script>
	var menuItems=document.getElementById("menuItems");
	menuItems.style.maxHeight="0px";
	function menutoggle(){

		if(menuItems.style.maxHeight=="0px"){
			menuItems.style.maxHeight="200px";
		}
		else{
            menuItems.style.maxHeight="0px";
		}
	}

</script>

</body>
</html>