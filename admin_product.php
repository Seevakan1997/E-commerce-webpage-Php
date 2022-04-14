<?php

include "database.php";
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['AdminLoginId']))
{
    header ("location:admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin_panel</title>
 
  <link rel="stylesheet"  href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body class="body2">

    
      
       <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
       <div class="headder">
           <h1>ADMIN PANEL-<?php  echo $_SESSION['AdminLoginId'] ?></h1>
           <a href="index.php"><img src="images/starstorelogo1.png" width="125"></a>
           <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <button type="submit" name="logout">LOG OUT</button>
           </form>
       </div>
       
<?php

   if(isset($_POST['logout']))
   {
       session_destroy();
       header ("location:admin.php");

   }

?>


<div class="wrapper">
    <div class="sidebar">
        
        <ul>
            <li><a href="admin_home.php"><i class="fas fa-home">  Home</i></a></li>
            <li><a href="admin_product.php"><i class="fa fa-archive" ></i>  Products</a></li>
            <li><a href="#section3"><i class="fas fa-user">  Users</i></a></li>
            <li><a href="admin_oder.php"><i class="fa fa-cart-arrow-down"></i>  Oders</a></li>
            <li><a href="#section5"><i class="fas fa-info">  About</i></a></li>
            <li><a href="#section6"><i class="fas fa-blog">  Blogs</i></a></li>
        </ul>
    </div>

</div>

<div class="small-container1">

<div class="box">
     
     <div class="block">
     
         <form name="forml" action="" method="POST">
         <h2>Add Product</h2>
             <table>
                 <tr>
                     <td>Product Name</td>
                     <td><input type="text" name="pname"></td>
                 </tr>
                 <tr>
                     <td>Product image</td>
                     <td><input type="file" name="pimage"></td>
                 </tr>
                 <tr>
                     <td>Product Price</td>
                     <td><input type="text" name="pprice"></td>
                 </tr>
                 
             </table>
             <button type="submit" class="btn btn-info btn-block" name="submit">Add Product</button>
         </form>
     </div>
</div>


</div>
<?php
  if(isset($_POST['submit']))
  {
    $sql="INSERT INTO latest_product(image,name,price) values('{$_POST["pimage"]}','{$_POST["pname"]}','{$_POST["pprice"]}')";
    $db->query($sql);
    echo "<script> alert('Upload Successfully') </script>";

  }
 
?>










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