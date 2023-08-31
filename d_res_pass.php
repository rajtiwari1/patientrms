<?php
  session_start();
  if(!$_SESSION["userID"])
  header("Location:doctor.login.php")
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="manifest" href="Resource/favicon/site.webmanifest">
     <link rel="stylesheet" type="text/css" href="css/pedit_style.css">
	 <style>
	.navigation-bar a{
		font-size: 16px;
	}
  
  </style>
     <title>Reset</title>
   </head>
   <body>
     <div class="top_img"></div>
     <div class="navigation-bar" style="text-align: center">
       <a href="ddashboard.php" >Home</a>
       <a href="drecords.php">Records </a>
       <a href="dsearch.php">Search</a>
       <a href="dinsert.php">Insert</a>
       <a class='logout' href="logout.php">Logout</a>
     </div>
     <div class='welcome'><h2 class='welcome_mssg'> Reset Password </h2></div>

     <div class="wrapper">
       <div class="container">
         <form class="ci_edit_form" action="d_res_pass.php" method="post">
            <input type="password" name="cp" placeholder="Current Password" required><br>
            <input type="text" name="np" placeholder="New Password" required><br>
            <input type="text" name="npr" placeholder="Re-enter Password" required>
            <input type="submit" name="info-submit" value="Save">
         </form>
       </div>
     </div>

     <?php
      require "connection.php";
      if(isset($_POST["info-submit"]))
      {
        if (!empty($_POST["cp"]) && !empty($_POST["np"]) && !empty($_POST["npr"])) {
            $uid=$_SESSION["userID"];
            $cp=$_POST["cp"]; $np=$_POST["np"]; $npr=$_POST["npr"];

            $sql="SELECT pass FROM doctor_login WHERE d_ssn = '$uid'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if($cp == $row["pass"]){
              if ($np == $npr) {
                $sql="UPDATE doctor_login SET pass= '$np' WHERE d_ssn='$uid'";
                $is_updated=mysqli_query($conn,$sql);
                if($is_updated){
                  echo "<p class='alert'>Password Updated Successfully</p>";
                }
                else {
                  header("Location:d_res_pass.php?Error");
                  exit();
                }
            }
            else {
              echo "<p class='alert'>Please Enter Same Password</p>";
            }
            }
            else {
              echo "<p class='alert'>Current Password Does Not Match</p>";
            }
        }
    }
      ?>

      <div class="footer"></div>
   </body>
 </html>
