<?php
  include("connect.php");
  include("function.php");
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <title></title>
  </head>
  <body>
    <img id="logo" src="Logo.png" alt="">
    <img id="background"src="background.jpg" alt="">
    <h2>CHOOSE YOUR PORTAL</h2>
    <div class="container">
      <div class="items">
        <a href="login.php?status=client"><img id="icon1" src="User Icon.png" alt=""></a>
        <h2 id="client">USER PORTAL</h2>
      </div>

      <div class="items">
        <a href="login.php?status=admin"><img id="icon2" src="Amin Icon.png" alt=""></a>
        <h2 id="admin">ADMIN PORTAL</h2>
      </div>

      <div class="items">
        <a href="dept_login.php"><img id="icon3" src="Department Icon.png" alt=""></a>
        <h2 id="department">DEPARTMENT PORTAL</h2>
      </div>
    </div>

    <p id="rights">All rights reserved 2021 ©  PILLARS DevCo. </p>
  </body>
</html>
