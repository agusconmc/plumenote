<?php
  include("connect.php");
  include("function.php");
  include("check_department.php");
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $dept_username = $_POST['dept_username'];
    $dept_name = $_POST['dept_name'];
    $dept_email = $_POST['dept_email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);


    if(!empty($dept_username) &&
       !empty($dept_name) &&
       !empty($dept_email) &&
       !empty($password) &&
       !empty($cpassword) &&
       $password==$cpassword){
           $query = "INSERT INTO department (dept_username,dept_name,dept_email,password) VALUES ('$dept_username','$dept_name','$dept_email','$password')";
           mysqli_query($link,$query);
           header("Location: admin.php");
           die;
         }else{
      echo "<script>alert('Please Fill In The Correct Data')</script>";
    }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <title>Add Department</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a href="index.php"><img src="logo.png" alt="LOGO"></a>
    </nav>
    <div class="container">
         <div class="register-form">
          <h2>Add Department</h2>
          <form method="post">
            <label for="dept_username">Department Username</label><br>
            <input id="dept_username" type="text" name="dept_username" placeholder="Use department Acronym" value=""><br><br>
            <label for="dept_name">Department Name</label><br>
            <input id="dept_name" type="text" name="dept_name" placeholder="Complete department name" value=""><br><br>
            <label for="email">Email</label><br>
            <input id="email" type="email" name="dept_email" placeholder="Enter email" value=""><br><br>
            <label for="password">Password</label><br>
            <input id="password" type="password" name="password" placeholder="Enter password" value=""><br><br>
            <label for="cpassword">Confirm Password</label><br>
            <input id="cpassword" type="password" name="cpassword" placeholder="Re-Enter password" value=""><br><br>
            <button type="submit" name="button">Add</button>
          </form>
          <p><strong><a href="admin.php">Cancel</a></strong></p>
        </div>
    </div>
   
  </body>
</html>

