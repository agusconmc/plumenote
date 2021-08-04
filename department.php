<?php
session_start();
include("connect.php");
include("function.php");
include("check_department.php");

$user_data=check_dept($link);
$data=$user_data['dept_username'];

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
    <title><?php echo $user_data['dept_name'] ?></title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a class="brand" href="index.php"><img src="logo.png" alt="LOGO"></a>
      <div class="nav-items">
          <a class="links" href="logout.php">Log-out</a>
      </div>
      
    </nav>

    <div class="container">
      <div class="user-records">
        <h2>Messages</h2>
        <table>
          <tr>
            <th>Sender</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
          <?php
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
        ?>
        </table>
      </div>
    </div>

  </body>
</html>
