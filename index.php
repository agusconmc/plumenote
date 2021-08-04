<?php
  session_start();
  include("connect.php");
  include("function.php");
  include("check_department.php");

  $user_data=check_login($link)
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="homepage.css">
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar">
      <a class="brand" href="index.php"><img class="brand" src="logo.png" alt="LOGO"></a>
      <div class="nav-items">
        <a class="links" href="index.php">Home</a>
        <a class="links" href="history.php">Suggestion History</a>
        <a class="links" href="profile.php">Profile</a>
        <a class="links" href="logout.php">Log-out</a>
      </div>
    </nav>

    <div class="hero">
      <img class="hero-img" src="logo.png" alt="hero">
      <h1>"Write your Comments and Suggestions"</h1>
      <a class="btn" href="message_box.php">Suggetion Box</a>
      <h1>"<span style="color:rgba(107, 255, 184, 0.85);">PlumeNote</span> let's you express you thoughts and opinion"</h1>
    </div>




  </body>
</html>
