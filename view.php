<?php
session_start();
include("connect.php");
include("function.php");
include("check_department.php");

$user_data=check_login($link);
$data=$_GET['user'];


$query = "SELECT * FROM messages WHERE department='$data' ORDER BY creation_date DESC";
$result = mysqli_query($link,$query);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="message_box.css">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a class="brand" href="index.php"><img src="logo.png" alt="LOGO"></a>
      <div class="nav-items">
          <a class="links" href="admin.php">Back</a>
      </div>
      
    </nav>

    <div class="container">
      <div class="user-records">
        <h2><?php echo "$data" ?> Messages</h2>
        <table>
          <tr>
            <th>Sender</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
          <?php
          if($result && mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_array($result)){
                $catcher = $row['user'];
                $sender = "SELECT username FROM users WHERE id=$catcher limit 1";
                $output = mysqli_query($link,$sender);
                if($output && mysqli_num_rows($output)>0){
                    $handler = mysqli_fetch_assoc($output);
                
                 echo "<tr>";
                 echo "<td>".$handler['username']."</td>";
                 echo "<td>".$row['message']."</td>";
                 echo "<td>".$row['creation_date']."</td>";
                 echo "</tr>";
                 
                }
             }
          }else{
                echo "<tr>";
                echo "<td>Empty</td>";
                echo "<td>Empty</td>";
                echo "<td>Empty</td>";
                echo "</tr>";
          }
        ?>
        </table>
      </div>
    </div>

  </body>
</html>
