<?php
  session_start();

  include("connect.php");
  include("function.php");
  include("check_department.php");

  $user_data=check_login($link);
  $id = $user_data['id'];

  $query = "SELECT * FROM messages WHERE user=$id";
  $result = mysqli_query($link,$query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="admin.css">
    <title>History</title>
  </head>
  <body style="background-color:rgba(107, 255, 184, 0.85);">
    <nav class="navbar">
      <a class="brand" href="index.php"> <img src="logo.png" alt="logo"> </a>
      <div class="nav-items">
        <a class="links" href="index.php">Home</a>
      </div>
    </nav>

    <div class="container">
      <div class="user-records">
        <h2>My Message History</h2>
        <table>
          <tr>
            <th>Department</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
            <?php
              if ($result->num_rows > 0){
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td>".$row['department']."</td>";
                  echo "<td>".$row['message']."</td>";
                  echo "<td>".$row['creation_date']."</td>";
                  echo "</tr>";
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

