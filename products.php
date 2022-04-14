
<?php

include "database.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>All Products-Star Store</title>
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
            $stmt=$db->prepare("SELECT * FROM  products");
            $stmt->execute();
            $result=$stmt->get_result();

            while($row=$result->fetch_assoc()):


					?>
          
					<div class="col-4">
                                         
                              
						<form class="form-submit" action="action.php" method="POST" >
                              <img src="<?php echo $row["image"]; ?>">
							                <h4><?php echo $row["name"];  ?></h4>
                              <p>$<?php echo $row["price"]; ?></p>

                            
                              <input type="hidden" name="product_id"  class="pid" value="<?php echo $row["p_id"];  ?>"/>
                              <input type="hidden"  name="pname" value="<?php echo $row["name"];  ?>"/>
                              <input type="hidden"  name="pprice" value="<?php echo $row["price"];  ?>"/>
                              <input type="hidden"  name="pimage" value="<?php echo $row["image"];  ?>"/>
                              
                             
							                 <button class="btn btn-info btn-block  " name="Add_To_Cart">Add to Cart</button>
                                
						</form>
                               <div class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
					</div>
					<?php
		        	endwhile;
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
<
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