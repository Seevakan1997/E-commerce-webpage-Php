
<?php

include "database.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Product Details-Star Store</title>
  <link rel="stylesheet"  href="style.css">
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
       
   </div>
<!-----------------single product details------------------------>
<div class="row">
        <?php
            $stmt=$db->prepare("SELECT * FROM  product_details");
            $stmt->execute();
            $result=$stmt->get_result();

            while($row=$result->fetch_assoc()):


					?>
          
				
          <div class="small-container single-product" >
        <div class="row">
          <div class="col-2">
          <img src="<?php echo $row["image"]; ?>" width="100%" id="ProductImg">
            <div class="small-img-row">
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
            </div>
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
                          
                              
						<form class="form-submit" action="action.php" method="POST" >
                             
							               
                            
                              <input type="hidden" name="product_id"  class="pid" value="<?php echo $row["p_id"];  ?>"/>
                              <input type="hidden"  name="pname" value="<?php echo $row["name"];  ?>"/>
                              <input type="hidden"  name="pprice" value="<?php echo $row["price"];  ?>"/>
                              <input type="hidden"  name="pimage" value="<?php echo $row["image"];  ?>"/>
                              <input type="hidden"  name="details" value="<?php echo $row["details"];  ?>"/>
                              <input type="hidden"  name="sm1" value="<?php echo $row["sm1"];  ?>"/>
                              <input type="hidden"  name="sm2" value="<?php echo $row["sm2"];  ?>"/>
                              <input type="hidden"  name="sm3" value="<?php echo $row["sm3"];  ?>"/>
                              <input type="hidden"  name="sm4" value="<?php echo $row["sm4"];  ?>"/>
                              
                             
							                 
                                
						</form>
        </div>
          </div>        
				
					<?php
		        	endwhile;
			    ?>
         
        </div>     
        </div>
      </div>   

<!--------------------------title------------------->
    <div class="small-container">
    <div class="row row-2">
      <h2>Related Products</h2>
      <p>View more</p>
    </div>
    
    
    </div>
    
    
    
    
    <!-------------products--------------->
      <div class="small-container">
        
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
<!--------------------js for product gallery-------------------->
<script>
  var ProductImg=document.getElementById("ProductImg");
  var SmallImg=document.getElementsByClassName("small-img");

    SmallImg[0].onclick=function(){
      ProductImg.src=SmallImg[0].src;

    }
    SmallImg[1].onclick=function(){
      ProductImg.src=SmallImg[1].src;
      
    }
    SmallImg[2].onclick=function(){
      ProductImg.src=SmallImg[2].src;
      
    }
    SmallImg[3].onclick=function(){
      ProductImg.src=SmallImg[3].src;
      
    }

</script>


</body>
</html>