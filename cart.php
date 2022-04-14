
<?php

include "database.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Cart-Star Store</title>
  <link rel="stylesheet"  href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
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
        $total=0;
      if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value)
        {
         $total=$total+$value['pprice'];
          echo"
            <tr>
              <td>$value[pname]</td>
              <td>$$value[pprice]</td>
              <td><input class='text-center' type='number' value='1'></td>
            
              <td>
              <form action='action.php' method='POST'>
              <button name='Remove_Item' class='btn btn-info btn-outline-danger'>Remove</button>
              <button name='order_item' class='button1 btn-info btn-outline-danger'>Buy</button>
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
  


</div>

         
  <div class="col">
           <h3>Total: $<?php echo $total  ?></h3>
         
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