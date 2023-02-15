<?php
session_start();

include('server.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>

<body class="body1">

  <div class="container">
    <div class="navbar">
      <div class="logo">
        <a href="index.php"><img src="images/starstorelogo1.png" width="125"></a>
      </div>

      <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
    </div>
  </div>


  <!------------------admin login page---------------->


  <div class="container1">


    <div class="admin_form">



      <form id="LoginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <h2>Admin Login</h2>
        <input type="text" placeholder="Admin_name" name="username" required>
        <input type="password" placeholder="password" name="password" required>
        <button type="submit" class="btn" name="submit">Login</button>

      </form>

    </div>
    <div class="image1">
      <img src="images/admin.jpg" width="100%">
    </div>
  </div>

  <?php
  function input_filter($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (isset($_POST['submit'])) {
    $username = input_filter($_POST['username']);
    $password = input_filter($_POST['password']);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    $query = "SELECT * FROM `admin_users` WHERE `username`=? AND `password`=?";

    if ($stmt = mysqli_prepare($db, $query)) {
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        session_start();
        $_SESSION['AdminLoginId'] = $username;
        header("location:admin_home.php");
      } else {
        echo "<script> alert('Invalid Admin_Name or Password') </script>";
      }
    } else {
      echo "<script> alert('SQL qurey not prepaere') </script>";
    }


  ?>




  <?php
  }


  ?>



</body>

</html>