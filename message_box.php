<?php
  session_start();
  include("connect.php");
  include("function.php");

  $user_data=check_login($link);

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $department = $_POST['department'];
    $message = $_POST['message'];
    $user_id= $_SESSION['id'];

    if(!empty($department) &&
       !empty($message)){
         $query = "INSERT INTO messages (user,message,department) VALUES ('$user_id','$message','$department')";
         mysqli_query($link,$query);
         header("Location: index.php?success=1");
         die;
       }
  }

 ?>


 

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="message_box.css">
    <link rel="stylesheet" href="register.css">
    <title>PlumeNote</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a class="brand" href="index.php"><img src="logo.png" alt="LOGO"></a>
      <div class="nav-items">
         <a class="links" href="index.php">Home</a>
        <a class="links" href="profile.php">Profile</a>
      </div>
    </nav>

    <div class="container">
      <div class="message-form">
        <form method="post">
          <br>
          <label for="option">To</label><br>
          <select id="option" name="department">
            <option value="" selected>---</option>
            <?php 
                $sql = "SELECT dept_username,dept_name FROM department";
                $result = mysqli_query($link,$sql);
                if ($result->num_rows > 0){
                    while($row = mysqli_fetch_array($result)){
                         echo "<option value=".$row['dept_username'].">".$row['dept_name']."</option>";
                        }
                    }else{
                        echo "<option>Nothing to Display Here</option>";
                    }
            ?>
          </select><br>
          <br><label for="textarea">Comments & Suggestions</label>
          <textarea id="textarea" name="message" rows="8" cols="80" placeholder="Write your comments and suggestions here"></textarea><br><br>
          <button type="submit" name="button">Send</button>
        </form>
        <p><strong><a href="index.php">Cancel</a></strong></p>
      </div>

      <div class="pic">
        <img src="message_box.png" alt="box ">
      </div>
    </div>

  </body>
</html>

