<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:admin.login.php?signin");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/ddash_style.css">
  <title> Dashboard </title>
</head>
<body>
  <div class="top_img"><h2 align=center> Admin Works</h2>
  </div>
  <div class="navigation-bar" style="text-align: center">
    <a href="admin_panel.php" >Home</a>
    <a href="aregister.php">Register</a>
    <a href="adelete.php">Delete</a>
    <a class='logout' href="logout.php">Logout</a>
  </div>
  

</body>
</html>
