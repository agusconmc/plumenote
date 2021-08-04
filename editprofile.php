<?php
  session_start();

  include("connect.php");
  include("function.php");

  $user_data=check_login($link);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $gname = $_POST['gname'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $id = $user_data['id'];

    $query = "UPDATE users SET gname='$gname',fname='$fname',email='$email' WHERE id = $id";
    mysqli_query($link,$query);
    header("Location: profile.php");
  }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <title>Profile</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
    </nav>
    <div class="container">
      <div class="register-form">
        <h2>Edit Profile</h2>
        <form method="post">
          <label for="gname">Given Name</label><br>
          <input id="gname" type="text" name="gname" placeholder="Enter first name" value=<?php echo $user_data['gname'] ?>><br><br>
          <label for="fname">Family Name</label><br>
          <input id="fname" type="text" name="fname" placeholder="Enter last name" value=<?php echo $user_data['fname'] ?>><br><br>
          <label for="email">Email</label><br>
          <input id="email" type="email" name="email" placeholder="Enter email" value=<?php echo $user_data['email'] ?>><br><br>
          <button type="submit" name="button">Apply Changes</button>
        </form>
        <p><a href="profile.php">Cancel</a></p>
      </div>
    </div>

  </body>
</html>
